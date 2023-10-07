<?php

namespace App\Http\Controllers;

use App\Models\chapter;
use App\Models\project;
use App\Models\user_role;
use App\Models\role;
use App\Models\department;
use App\Models\user;
use App\Models\project_query;


use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function titleConfirmation(Request $request, $project_id)
    {
        $projects = Project::findOrFail($project_id);

        $confirm_title = $request->has('confirm_title');
        $title = $request->input('title');
        $subtitle = $request->input('subtittle');

        $projects->update(['title' => $title, 'subtittle' => $subtitle, 'confirm_title' => $confirm_title]);

        return back();
    }

    public function titleConfirmationstudent(Request $request, $project_id)
    {
        $projects = Project::findOrFail($project_id);

        $confirm_title = $request->has('confirm_title');
        $title = $request->input('title');
        $subtitle = $request->input('subtittle');

        $projects->update(['title' => $title, 'subtittle' => $subtitle]);

        return back();
    }


    public function UpdateUsers(Request $request)
    {
    // Validate the form inputs
    $validatedData = $request->validate([
        'supervisor_id' => 'required|numeric',
        'student_id' => 'nullable|array',
        'student_id.*' => 'nullable|numeric',
        'department' => 'required|array',
        'department.*' => 'required',
        'supervisorCheckbox' => 'nullable',
        'adminCheckbox' => 'nullable',
    ]);

    // Check if any student_id is provided
    if (!empty($validatedData['student_id'])) {
        foreach ($validatedData['student_id'] as $key => $studentId) {
            $department = $validatedData['department'][$key];

            $student = User::find($studentId);
            if (!$student) {
                // Student with the given ID does not exist
                continue;
            }

            // Check if a project already exists for the student
            $existingProject = Project::where('supervisor_id', $validatedData['supervisor_id'])
                ->where('student_id', $studentId)
                ->first();
            if (!$existingProject) {
                // Create a new project if it doesn't already exist
                $project = new Project();
                $project->supervisor_id = $validatedData['supervisor_id'];
                $project->student_id = $studentId;
                $project->department = $department;
                $project->save();

                $projectQuery = new project_query();
                $projectQuery->title = 'project query';
                $projectQuery->project_id = $project->id;
                $projectQuery->save();

                $student->roles()->sync([1]);

                // Find a project with the same department as the existing project
                $sameDepartmentProject = Project::where('department', $department)->first();

                if ($sameDepartmentProject) {
                    // Retrieve chapters from the project with the same department
                    $existingChapters = $sameDepartmentProject->chapters;

                    foreach ($existingChapters as $existingChapter) {
                        $newChapter = new Chapter();
                        $newChapter->project_id = $project->id;
                        $newChapter->title = $existingChapter->title;
                        $newChapter->template = $existingChapter->template;
                        $newChapter->guidline = $existingChapter->guidline;
                        $newChapter->deadline = $existingChapter->deadline;
                        $newChapter->save();
                    }
                }
            } else {
                // Update the existing project's department
                $existingProject->department = $department;
                $existingProject->save();
            }
        }
    }

    $userId = $request->input('supervisor_id');
    $user = User::find($userId);
    $user_roles = $user->roles()->get();
    foreach ($user_roles as $user_role) {
        if ($request->has('supervisorCheckbox') && $request->has('adminCheckbox')) {
            $user->roles()->sync([2, 3]);
        } else if ($request->has('supervisorCheckbox')) {
            $user->roles()->sync([2]);
        } else if ($request->has('adminCheckbox')) {
            $user->roles()->sync([3]);
        }
    }

    // Redirect or perform any other actions after storing the data
    return redirect()->back();
}




    public function GetAllProject(){
        $supervisor = User::findOrFail(8);
        $projects = Project::where('supervisor_id', $supervisor->id)
        ->orderBy('student_id', 'asc')
        ->get();

        $studentIds = $projects->pluck('student_id');
        $students = User::whereIn('id', $studentIds)
        ->orderBy('id', 'asc')
        ->get();

        return view('supervisor.viewprojects',compact('supervisor','projects','students'));
    }
}
