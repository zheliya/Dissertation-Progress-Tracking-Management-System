<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\chapter;
use App\Models\project;
use App\Models\chapter_history;
use App\Models\task_history;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentStatementUpdate;
use App\Mail\FileSubmissionNotificationTask;
use App\Mail\StatementUpdateNotification;


class TaskController extends Controller
{


    //supervisor task
    public function UpdateStatementTask(Request $request, $task_id)
    {
        $task_id = task::findOrFail($task_id);
        $task_id->update($request->all());
        return back();

    }


    public function updateStatementTaskStudent(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->update($request->only('student_statement'));

        // Sending email to supervisor only if the "Update" button was clicked
        if ($request->has('save')) {
            $chapter = $task->chapter;
            $project = $chapter->project;
            $supervisor = User::find($project->supervisor_id);
            $student = Auth::user();

            if ($supervisor) {
                $supervisorEmail = $supervisor->email;
                $data = [
                    'student' =>  $student,
                    'project' => $project,
                    'chapter' => $chapter,
                    'task' => $task
                ];
                Mail::to($supervisorEmail)->send(new StatementUpdateNotification($data));
            }
        }

        return back();
    }



    public function progressinputtask(Request $request, $task_id)
    {
        $progress_input = $request->input('progress_input');
        // validate the range to make sure it's between 0 and 100
        $validatedData = $request->validate([
            'progress_input' => 'required|numeric|min:0|max:100',
        ]);
        Task::where('id', $task_id)->update(['task_status'=>number_format($progress_input, 2)]);
        return back();
    }


    // supervisor
    public function addTask(Request $request, $chapter_id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'Deadline' => 'required|date',
            'template_file' => 'file|max:2048', // Allow single file, up to 2MB
            'guideline_file' => 'file|max:2048', // Allow single file, up to 2MB
        ]);

        // Retrieve the chapter based on the ID
        $chapter = Chapter::findOrFail($chapter_id);

        // Create a new task associated with the chapter
        $task = new Task;
        $task->title = $validatedData['title'];
        $task->Deadline = $validatedData['Deadline'];
        $task->chapter_id = $chapter->id;
        $task->save();

        // Store the template file
        if ($request->hasFile('template_file')) {
            $templateFile = $request->file('template_file');
            $templateFileName = 'template_task_' . uniqid() . '_' . 'chapter_' . $chapter_id . '.' .
                $templateFile->getClientOriginalExtension();
            $templateFile->storeAs('templates', $templateFileName);
            $task->template = $templateFileName;
        }
        // Store the guideline file
        if ($request->hasFile('guideline_file')) {
            $guidelineFile = $request->file('guideline_file');
            $guidelineFileName = 'guideline_task_' . uniqid() . '_' . 'chapter_' . $chapter_id . '.' .
                $guidelineFile->getClientOriginalExtension();
            $guidelineFile->storeAs('guidelines', $guidelineFileName);
            $task->guidline = $guidelineFileName;
        }

        // Save the task model
        $task->save();

        return redirect()->back();
    }


    public function fileSubmition(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);
        $chapter = $task->chapter;

        if (now() > $task->deadline) {
            return back()->withErrors('The deadline has passed. File submission is no longer allowed.');
        }

        if ($request->hasFile('fileToUpload')) {
            $file = $request->file('fileToUpload');
            // Generate a new file name
            $newFileName =
                'task_'.$task->id.'_chapter_'.
                $chapter->id.'_project_'.$chapter->project_id.'_'.
                Carbon::now()->format('Ymd_His').'.'.$file->getClientOriginalExtension();
            $file->storeAs('chapters_tasks', $newFileName);
            // Store the file with the new file name

            if (!empty($task->submition)) {
                task_history::create([
                    'file_adress' => $task->submition,
                    'file_id' => $task->id,
                    'created_at' => $task->updated_at
                ]);
            }

            task::where('id', $task->id)->update([
                'submition' => $newFileName,
                'updated_at' => now()
            ]);

            // Sending email to supervisor
            $project = $chapter->project;
            $supervisor = User::find($project->supervisor_id);
            $student = Auth::user();


            if ($supervisor) {
                $supervisorEmail = $supervisor->email;
                $data = [
                    'project' => $project,
                    'chapter' => $chapter,
                    'task' => $task
                ];
                Mail::to($supervisorEmail)->send(new FileSubmissionNotificationTask($data));
            }
        }

        return back();
    }




}
