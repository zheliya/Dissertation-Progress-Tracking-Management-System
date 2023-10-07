<!DOCTYPE html>
<html>
<head>
    <title>STATEMENT UPDATE</title>
</head>
<body>
    <h2>STATEMENT UPDATE</h2>
    <p>Hello Supervisor,</p>
    <p>A student from the project "{{ $project->title }}" has UPDATEED THIER STATEMENT.</p>
    <p>Project: {{ $project->title }}</p>
    <p>Chapter: {{ $chapter->title }}</p>
    <p>Task: {{ $task->title }}</p>
    <p>Please review the file and provide necessary feedback or guidance to the student.</p>
    <p>You can access the project and chapter using the following URL:</p>
    <p><a href="{{ url("/Project/{$project->id}/Chapter/{$chapter->id}/Task/{$task->id}") }}">
        {{ url("/Project/{$project->id}/Chapter/{$chapter->id}/Task/{$task->id}") }}</a></p>
    <p>Thank you!</p>
</body>
</html>
