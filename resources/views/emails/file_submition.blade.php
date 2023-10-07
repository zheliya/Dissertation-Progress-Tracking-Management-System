<!DOCTYPE html>
<html>
<head>
    <title>New File Submission</title>
</head>
<body>
    <h2>New File Submission</h2>
    <p>Hello Supervisor,</p>
    <p>{{ $student->full_name }} from the project "{{ $project->title }}" has submitted a new file for a chapter.</p>
    <p>Chapter ID: {{ $chapter->title }}</p>
    <p>Project ID: {{ $project->title }}</p>
    <p>Please review the file and provide necessary feedback or guidance to the student.</p>
    <p>You can access the project and chapter using the following URL:</p>
    <p><a href="{{ url("/Project/{$project->id}/Chapter/{$chapter->id}") }}">{{ url("/Project/{$project->id}/Chapter/{$chapter->id}") }}</a></p>
    <p>Thank you!</p>
</body>
</html>
