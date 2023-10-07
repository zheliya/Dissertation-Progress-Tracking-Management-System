@extends('layouts.app_admin_chapter')
@section('content')
    <form action="{{ route('ChapterForm', ['department_id' => $department_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container w-75">

            <div id="the_student_input_container" class="the_student_input_container ">
                <div class="supervisor_student_inputs_container">
                    @if ($project)
                        @php
                            $chapters = $project->chapters->sortBy('deadline')->unique('title');
                        @endphp

                        @foreach ($chapters as $chapter)
                            <div class="supervisor_student_inputs container pt-5">
                                <label for="chapter_title"
                                    class="user_id_input_label text-start d-block">{{ $chapter->title }}</label>
                                <input name="edit_chapter_id[{{ $chapter->id }}]" type="text"
                                    value="{{ $chapter->title }}"
                                    class="supervisor_student_id_input d-block ps-3 pe-3 w-100"
                                    id="chapter_id_{{ $chapter->id }}" placeholder="{{ $chapter->title }}">
                                @if ($chapter->template)
                                    <a href="/public/templates/{{ $chapter->template }}" download>
                                        <i class="bi bi-file-earmark-text-fill submition-icon"></i>
                                    </a>
                                @endif
                                <label for="template_file" class="form-label">Template</label>
                                <input name="edit_template_file[{{ $chapter->id }}]" class="form-control" type="file"
                                    id="chapter_id_{{ $chapter->id }}">
                                @if ($chapter->guideline)
                                    <a href="/public/guidlines/{{ $chapter->guideline }}" download>
                                        <i class="bi bi-file-earmark-text-fill submition-icon"></i>
                                    </a>
                                @endif
                                <label for="guideline_file" class="form-label">Guideline</label>
                                <input name="edit_guideline_file[{{ $chapter->id }}]" class="form-control" type="file"
                                    id="chapter_id_{{ $chapter->id }}">

                                <input type="datetime-local" name="edit_Deadline[{{ $chapter->id }}]" step="1"
                                    pattern="\d{2}-\d{2}-\d{4}\s\d{2}:\d{2}:\d{2}"
                                    value="{{ old('date', $chapter->deadline) }}" required>
                            </div>
                        @endforeach
                    @else
                        <h1>No project exists in this department</h1>
                    @endif
                </div>
                <div class="add_student_button_container container pt-5">
                    <button class="add_student_input_button" type="button" onclick="addChapterInput()">Add Chapter</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection




