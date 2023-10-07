<?php

namespace App\Http\Controllers;

use App\Mail\FileSubmissionNotification;
use App\Mail\StudentStatementUpdate;
use App\Models\chapter;
use App\Models\chapter_history;
use App\Models\department;
use App\Models\project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{

    public function UpdateStatement(Request $request, $chapter_id)
    {
        $chapter = Chapter::findOrFail($chapter_id);
        $chapter->update($request->all());
        return back();

    }
    public function UpdateStatementStudent(Request $request, $chapter_id)
    {
        $chapter = Chapter::findOrFail($chapter_id);

        if ($request->has('update')) {
            // Update statement logic
            $chapter->update($request->all());

            // Send email to supervisor
            $supervisor = User::find($chapter->project->supervisor_id);
            if ($supervisor) {
                $data = [
                    'studentName' => 'student name',
                    'project' => $chapter->project,
                    'chapter' => $chapter,
                ];
                Mail::to($supervisor->email)->send(new StudentStatementUpdate($data));
            }
        } elseif ($request->has('edit')) {
            $chapter->update($request->all());
        }

        return back();

    }

    public function fileSubmition(Request $request, $chapter_id, $project_id)
    {

        $chapter = chapter::findOrFail($chapter_id);

        if (now() > $chapter->deadline) {
            return back()->withErrors('The deadline has passed. File submission is no longer allowed.');
        }
        if ($file = $request->file('fileToUpload')) {
            $file = $request->file('fileToUpload');
            // Generate a new file name
            $newFileName =
            'chapter_' . $chapter->id . '_project_'
            . $chapter->project_id . '_'
            . Carbon::now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('chapters_tasks', $newFileName);
            // Store the file with the new file name
            if (!empty($chapter->submition)) {
                chapter_history::create([
                    'file_adress' => $chapter->submition,
                    'file_id' => $chapter->id,
                    'created_at' => $chapter->updated_at,
                ]);
            }
            chapter::where('id', $chapter->id)->update([
                'submition' => $newFileName,
                'updated_at' => now()]);

            // Sending email to supervisor
            $project = Project::findOrFail($project_id);
            $supervisor = User::find($project->supervisor_id);
            $student = Auth::user();

            if ($supervisor) {
                $supervisorEmail = $supervisor->email;
                $data = [
                    'student' => $student,
                    'project' => $project,
                    'chapter' => $chapter,
                ];
                Mail::to($supervisorEmail)->send(new FileSubmissionNotification($data));
            }

        }
        return back();

    }

    public function progressinput(Request $request, $chapter_id)
    {
        $progress_input = $request->input('progress_input');

        // validate the range to make sure it's between 0 and 100
        $validatedData = $request->validate([
            'progress_input' => 'required|numeric|min:0|max:100',
        ]);

        Chapter::where('id', $chapter_id)->update(['chapter_status' => number_format($progress_input, 2)]);
        return back();
    }

    public function chapterCreateUpdate(Request $request, $department_id)
    {

        $departments = department::orderBy('name', 'asc')->get();
        $project = project::where('department', $department_id)->first();
        $department_id = $department_id;

        return view('admin.create_chapter_details', compact('departments', 'project', 'department_id'));
    }

    public function ChapterForm(Request $request, $department_id)
    {   $department = Department::findOrFail($department_id);
        $projects = Project::where('department', $department_id)->get();
        foreach ($projects as $project) {
            // Handle existing data updates for each project
            foreach ($project->chapters as $chapter) {
                $chapterId = $chapter->id;
                $chapterTitle = $request->input('edit_chapter_id.' . $chapterId);
                if (!empty($chapterTitle)) {
                    // Find chapters with the same title in projects with the same department
                    $chaptersToUpdate = Chapter::where('title', $chapter->title)
                        ->whereHas('project', function ($query) use ($department_id) {
                            $query->where('department', $department_id);
                        })
                        ->get();
                    foreach ($chaptersToUpdate as $chapterToUpdate) {
                        // Handle template file update
                        if ($request->hasFile('edit_template_file.' . $chapterId)) {
                            $templateFile = $request->file('edit_template_file.' . $chapterId);
                            if ($templateFile->isValid()) {
                                $templateFileNewName = 'Template_chapter_' . $chapterToUpdate->id .
                                    '_project_' . $department->name . '_' . Carbon::now()->format('Ymd_His')
                                    . '.' . $templateFile->getClientOriginalExtension();
                                $templateFile->storeAs('templates', $templateFileNewName);
                                $chapterToUpdate->template = $templateFileNewName;
                            }
                        }
                        // Handle guideline file update
                        if ($request->hasFile('edit_guideline_file.' . $chapterId)) {
                            $guidelineFile = $request->file('edit_guideline_file.' . $chapterId);
                            if ($guidelineFile->isValid()) {
                                $guidelineFileNewName = 'Guideline_chapter_' . $chapterToUpdate->id .
                                    '_project_' . $department->name . '_' . Carbon::now()->format('Ymd_His')
                                    . '.' . $guidelineFile->getClientOriginalExtension();
                                $guidelineFile->storeAs('guidelines', $guidelineFileNewName);
                                $chapterToUpdate->guidline = $guidelineFileNewName;
                            }
                        }

                        // Update existing deadline
                        $chapterDeadline = $request->input('edit_Deadline.' . $chapterId);
                        $chapterToUpdate->title = $chapterTitle;
                        $chapterToUpdate->deadline = $chapterDeadline;
                        $chapterToUpdate->save();
                    }
                }
            }
        }

        $validatedData = $request->validate([
            'chapter_title.*' => 'required|string',
            'template_file.*' => 'required|file',
            'guideline_file.*' => 'required|file',
            'Deadline.*' => 'required|date_format:Y-m-d\TH:i:s',
        ]);
        if (isset($validatedData['chapter_title'])) {
            foreach ($projects as $project) {
                foreach ($validatedData['chapter_title'] as $key => $chapterTitle) {
                    $chapter = new Chapter();
                    $chapter->title = $chapterTitle;
                    // Set other chapter properties as needed
                    $project->chapters()->save($chapter);
                    $templateFile = $request->file('template_file.' . $key);
                    if ($templateFile && $templateFile->isValid()) {
                        $templateFileNewName = 'Template_chapter_' . $chapter->id . '_project_'
                            . $department->name . '_' . Carbon::now()->format('Ymd_His')
                            . '.' . $templateFile->getClientOriginalExtension();
                        $templateFile->storeAs('templates', $templateFileNewName);
                    }
                    $guidelineFile = $request->file('guideline_file.' . $key);
                    if ($guidelineFile && $guidelineFile->isValid()) {
                        $guidelineFileNewName = 'Guideline_chapter_' . $chapter->id . '_project_'
                            . $department->name . '_' . Carbon::now()->format('Ymd_His')
                            . '.' . $guidelineFile->getClientOriginalExtension();
                        $guidelineFile->storeAs('guidlines', $guidelineFileNewName);
                    }
                    $deadline = isset($validatedData['Deadline'][$key]) ? Carbon::parse($validatedData['Deadline'][$key]) : null;
                    $chapter->deadline = $deadline;
                    $chapter->save();
                }
            }
        }
        //creating new chapter
        return back();
    }

}
