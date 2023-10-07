<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Repository\PostsRepository;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HistoryfileController;
use App\Http\Controllers\ProjectQueryController;

use App\Models\chapter;
use App\Models\project;
use App\Models\User;
use App\Models\task;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function indexstudent(){
                // Retrieve the project with ID = 1 and eager load its related chapters and tasks
                $projects = Project::with('chapters.tasks')->find(1);
                $chapters = chapter::findOrFail(1);
                $supervisor = Project::findOrFail(1);


                // Access the project's chapters and tasks
        /*         foreach ($projects->chapters as $chapter) {
                    echo "Chapter title: " . $chapter->title . "<br>";
                        foreach ($chapter->tasks as $task) {
                            echo "Task title: " . $task->title . "<br>";
                        }
                } */

                return view('student.index',compact('projects','chapters'));
    }

public function project_query(){
    $projects = Project::with('chapters.tasks')->find(1);
    $chapters = chapter::findOrFail(1);
    $supervisor = Project::findOrFail(1);
    $project_query = $projects->first()->project_query;
    return view('supervisor.project_query',compact('project_query','projects','chapters'));
}


public function GetProject($project_id)
{
    $projects = Project::find($project_id);

    $supervisor = User::findOrFail(8);

    $SubProjects = Project::where('supervisor_id', $supervisor->id)
        ->orderBy('student_id', 'asc')
        ->get();

    $studentIds = $SubProjects->pluck('student_id');
    $SubStudents = User::whereIn('id', $studentIds)
        ->orderBy('id', 'asc')
        ->get();

    //$current_student_id = $projects->student_id();
    $current_student = User::findOrFail($projects->student_id);

    $project_query = $projects->first()->project_query;


    // Calculate average chapter status
    $totalStatus = 0;
    $chapterCount = count($projects->chapters);

    foreach ($projects->chapters as $chapter) {
        $totalStatus += $chapter->chapter_status;
    }

    $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;

    // Update project status
    $projects->project_status = $averageStatus;
    $projects->save();



    return view('supervisor.project_query', compact('project_query', 'projects', 'supervisor', 'SubProjects', 'SubStudents', 'current_student'));
}


public function Chapter( $project_id,$chapter_id)
{
    $projects = Project::with('chapters.tasks')->find($project_id);
    $chapters = Chapter::findOrFail($chapter_id);

    $supervisor = User::findOrFail(8);
    $SubProjects = Project::where('supervisor_id', $supervisor->id)
        ->orderBy('student_id', 'asc')
        ->get();

    $studentIds = $SubProjects->pluck('student_id');
    $SubStudents = User::whereIn('id', $studentIds)
        ->orderBy('id', 'asc')
        ->get();

    $current_student_id = $projects->student_id;
    $current_student = User::findOrFail($current_student_id);


    $project_query = $projects->project_query;


    $chapter = Chapter::findOrFail($chapter_id);

    $deadline = $chapter->deadline;
    $currentDate = now();
    $diff = $currentDate->diff($deadline);
    $days = $diff->days;
    $hours = $diff->h;
    $minutes = $diff->i;

    if ($currentDate <= $deadline) {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes left";
    } elseif (!empty($chapter->submition)) {
        $timeLeft = "Submitted {$days} days {$hours} hours {$minutes} minutes before deadline";
    } else {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes overdue";
    }
    // Calculate average chapter status
    $totalStatus = 0;
    $chapterCount = count($projects->chapters);

    foreach ($projects->chapters as $chapter) {
        $totalStatus += $chapter->chapter_status;
    }

    $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;

    // Update project status
    $projects->project_status = $averageStatus;
    $projects->save();


    return view('supervisor.chapter', compact('timeLeft','supervisor','projects', 'SubStudents', 'SubProjects', 'chapters', 'project_query', 'current_student'));
}


public function ChapterTask($project_id, $chapter_id, $task_id)
{
    $projects = Project::with('chapters.tasks')->find($project_id);
    $chapters = Chapter::findOrFail($chapter_id);
    $ActiveTask = $chapters->tasks()->findOrFail($task_id);

    $supervisor = User::findOrFail(8);
    $SubProjects = Project::where('supervisor_id', $supervisor->id)
        ->orderBy('student_id', 'asc')
        ->get();

    $studentIds = $SubProjects->pluck('student_id');
    $SubStudents = User::whereIn('id', $studentIds)
        ->orderBy('id', 'asc')
        ->get();

    $current_student_id = $projects->student_id;
    $current_student = User::findOrFail($current_student_id);

    $project_query = $projects->first()->project_query;

    $deadline= $ActiveTask->deadline;
    $currentDate = now();
    $diff = $currentDate->diff($deadline);
    $days = $diff->days;
    $hours = $diff->h;
    $minutes = $diff->i;

    $timeLeft = "{$days} days {$hours} hours {$minutes} minutes left";


    if ($currentDate <= $deadline) {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes left";
    } elseif (!empty($ActiveTask->submition)) {
        $timeLeft = "Submitted {$days} days {$hours} hours {$minutes} minutes before deadline";
    } else {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes overdue";
    }


    // Calculate average chapter status
    $totalStatus = 0;
    $chapterCount = count($projects->chapters);

    foreach ($projects->chapters as $chapter) {
        $totalStatus += $chapter->chapter_status;
    }

    $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;

    // Update project status
    $projects->project_status = $averageStatus;
    $projects->save();


    return view('supervisor.task', compact('timeLeft','supervisor','projects', 'chapters', 'ActiveTask', 'project_query', 'current_student', 'SubProjects', 'SubStudents'));
}



public function GetProject_student()
{
    //$student = Auth::user();
    $student = User::findOrFail(2);
    $project = Project::where('student_id', $student->id)->first();

    $supervisor = null;
    $project_query = null;

    if ($project) {
        $supervisor = User::find($project->supervisor_id);
        $project_query = $project->project_query;

        // Calculate average chapter status
        $totalStatus = 0;
        $chapterCount = count($project->chapters);

        foreach ($project->chapters as $chapter) {
            $totalStatus += $chapter->chapter_status;
        }

        $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;

        // Update project status
        $project->project_status = $averageStatus;
        $project->save();
    }

    return view('student.project_query', compact('student', 'project_query', 'project', 'supervisor'));
}

public function Chapter_student($project_id, $chapter_id)
{
    $student = User::findOrFail(2);
    $project = Project::with('chapters.tasks')->find($project_id);

    $supervisor = null;
    $project_query = null;

    if ($project) {
        $supervisor = User::find($project->supervisor_id);
        $project_query = $project->project_query;
    }
    $chapter = Chapter::findOrFail($chapter_id);

    $deadline = $chapter->deadline;
    $currentDate = now();
    $diff = $currentDate->diff($deadline);
    $days = $diff->days;
    $hours = $diff->h;
    $minutes = $diff->i;

    if ($currentDate <= $deadline) {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes left";
    } elseif (!empty($chapter->submition)) {
        $timeLeft = "Submitted {$days} days {$hours} hours {$minutes} minutes before deadline";
    } else {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes overdue";
    }
    // Calculate average chapter status
    $totalStatus = 0;
    $chapterCount = count($project->chapters);
    foreach ($project->chapters as $innerChapter) {
        $totalStatus += $innerChapter->chapter_status;
    }
    $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;
    // Update project status
    $project->project_status = $averageStatus;
    $project->save();
    return view('student.chapter',
        compact('student', 'timeLeft', 'supervisor', 'project', 'chapter', 'project_query','chapter_id'));
}



public function ChapterTask_student($project_id, $chapter_id, $task_id)
{   //$student = Auth::user();
    $student = User::findOrFail(2);
    $project = Project::with('chapters.tasks')->find($project_id);
    $supervisor = null;
    $project_query = null;

    if ($project) {
        $supervisor = User::find($project->supervisor_id);
        $project_query = $project->project_query;
    }
    $chapter = Chapter::findOrFail($chapter_id);
    $Task = $chapter->tasks()->findOrFail($task_id);

    $deadline= $chapter->deadline;
    $currentDate = now();
    $diff = $currentDate->diff($deadline);
    $days = $diff->days;
    $hours = $diff->h;
    $minutes = $diff->i;

    if ($currentDate <= $deadline) {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes left";
    } elseif (!empty($Task->submition)) {
        $timeLeft = "Submitted {$days} days {$hours} hours {$minutes} minutes before deadline";
    } else {
        $timeLeft = "{$days} days {$hours} hours {$minutes} minutes overdue";
    }
    // Calculate average chapter status
    $totalStatus = 0;
    $chapterCount = count($project->chapters);

    foreach ($project->chapters as $chapter) {
        $totalStatus += $chapter->chapter_status;
    }
    $averageStatus = $chapterCount > 0 ? $totalStatus / $chapterCount : 0;
    // Update project status
    $project->project_status = $averageStatus;
    $project->save();

    return view('student.task',
        compact('Task','student','timeLeft','supervisor','project', 'chapter', 'project_query'));
}



    // $supervisor = User::findOrFail(5);
    // $projects = Project::where('supervisor_id', $supervisor->id)
    // ->orderBy('student_id', 'asc')
    // ->get();

    // $studentIds = $projects->pluck('student_id');
    // $students = User::whereIn('id', $studentIds)
    // ->orderBy('id', 'asc')
    // ->get();

    // return view('supervisor.viewprojects',compact('supervisor','projects','students'));








    public function getOptions()
    {
        $departments = Department::all();

        $users = User::whereDoesntHave('roles')
            ->orWhereHas('roles', function ($query) {
                $query->whereIn('role_id', [1]);
            })
            ->whereNotIn('id', function ($query) {
                $query->select('student_id')->from('projects');
            })
            ->get();

        return response()->json(['departments' => $departments, 'users' => $users]);

    }






}



