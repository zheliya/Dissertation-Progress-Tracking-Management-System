@extends('layouts.app_student')

@section('content')
    <br><br>
    <div class="container submition-container">
        @if (isset($chapter->submition))
            <div class="row submition-background">
                <div class="col-md-1 text-start">
                    <a href="/public/chapters_tasks/{{ $chapter->submition }}" download>
                        <i class="bi bi-file-earmark-text-fill submition-icon"></i>
                    </a>
                </div>
                <div class="col-md-7 text-start m-auto ps-1 submition-title">{{ $chapter->submition }}</div>
                <div class="col-md-4 m-auto text-end submition-date">date {{ $chapter->submition_date }}</div>
            </div>
        @else
            <div class="row">
                <h4 class="text-center">No Submition Yet</h4>
            </div>
        @endif
        <div class="row p-3">
            <div class="row">
                <div class="col text-start submition-deadline-title">
                    deadline
                </div>
            </div>
            <div class="row ps-4 ">
                <div class="col text-start submition-deadline">{{ $chapter->deadline }}</div>
                <div class="col text-end submition-deadline-time-left">{{ $timeLeft }}</div>
            </div>
            <div class="row text-end">
                <div class="col">
                    <button type="button" class="btn btn-primary" class="add-task" data-bs-target="#SubmitFile"
                        data-bs-toggle="modal">
                        Submit file
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="modal fade" id="SubmitFile" aria-hidden="true" aria-labelledby="SubmitFileLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content add-task-model">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="fileUploadForm"
                        action="{{ route('fileSubmition', ['chapter_id' => $chapter_id, 'project_id' => $project->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Submit File</label>
                            <input class="form-control" name="fileToUpload" type="file" id="formFile">
                        </div>
                        <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <form action="" class="text-end">
        <div class="container m-auto progress-input-container align-middle">
            <div class="row  m-auto row-progress-input ">
                <div class="container container-progress-input pt-3">
                    <div class="progress progress-bar-input" role="progressbar" aria-label="Example with label"
                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar main-progress-bar-input-scale" id="progressBar"
                            style="width: {{ $chapter->chapter_status }}%">
                            <value class="main-progress-bar-input-value" id="progressValue"> {{ $chapter->chapter_status }}%
                            </value>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-auto progress-text">
                <div class="col text-start ">needs more work</div>
                <div class="col text-center">in progress</div>
                <div class="col text-end">completed</div>
            </div>
        </div>

    </form>
    <br><br><br><br>
    <div class="container m-auto align-middle student-statement-container">
        <div class="row pt-2">
            <div class="col ">
                <a href="#" class="d-flex align-items-center text-decoration-none statement-porfile-text"
                    aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    {{ $supervisor->full_name }}
                </a>
            </div>
        </div>
        <hr class="underline mt-2 m-auto">
        <div class="statement-text-container p-4 pt-3 container text-start">
            <div class="statment-container" id="statment-container">
                {!! $chapter->supervisor_statement !!}
            </div>
        </div>
    </div>
    <br>
    <div class="container m-auto align-middle student-statement-container">
        <div class="row pt-2">
            <div class="col ">
                <a href="#" class="d-flex align-items-center text-decoration-none statement-porfile-text"
                    aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    {{ $student->full_name }}
                </a>
            </div>
            <div class="col align-middle align-items-center text-end m-auto">
                <button class="edit-button" onclick="myFunction('edit')">Edit</button>
                <button class="update-button" onclick="myFunction('update')">Update</button>
            </div>
        </div>
        <hr class="underline mt-2 m-auto">
        <div class="statement-text-container p-4 pt-3 container text-start">
            <div class="statment-container" id="statment-container">
                {!! $chapter->student_statement !!}
            </div>
            <div class="statment-edit-container p-0 m-0" id="statment-edit-container">
                <form method="POST" action="{{ route('UpdateStatement', ['chapter_id' => $chapter->id]) }}"
                    class="p-0 m-0" id="update-text-form">
                    @csrf
                    {{ csrf_field() }}
                    <textarea v-model="content" id="tinymcestatement" class="tinymce-editor " name="student_statement">{{ $chapter->student_statement }}</textarea>
                    <input class="btn btn-primary submit-update" id="submit-button" type="submit" name="submit" value="Save">
                </form>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script src="https://cdn.tiny.cloud/1/cgiq8otbdluv9r66h1nllvbv6luez5dzulkdisjj5g4uphcn/tinymce/6/tinymce.min.js"
                    referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: 'textarea#tinymcestatement',
                        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    });
                </script>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container ">
        <button class="history_files_button" id="history_files_button">
            History Files
        </button>
        <div class="container history_files_container p-4 d-none" id="history_files_container">


            @foreach ($chapter->chapter_history as $history_file)
                <div class="row history_file_row mb-3 mt-3">
                    <div class="col-md-1 text-start ">
                        <a href="/public/chapters_tasks/{{ $history_file->file_adress }}" download>
                            <i class="bi bi-file-earmark-text-fill history_file_icon"></i>
                        </a>
                    </div>
                    <div class="col-md-7 m-auto ps-0 text-start file_history_text">{{ $history_file->file_adress }}</div>
                    <div class="col-md-4 m-auto text-end ">{{ $history_file->created_at }}</div>
                </div>
            @endforeach
        </div>
    </div>


    <footer class="pb-5 pt-5">
        <div class="container">
            <div class="row justify-content-evenly text-start">
                @if (!empty($chapter->guidline))
                    <div class="col-3 guidline_container">
                        <a class="p-0" href="/public/chapters_tasks/{{ $chapter->guidline }}" download>
                            <i class="bi bi-file-earmark-text-fill submition-icon"></i> Guideline
                        </a>
                    </div>
                @endif

                @if (!empty($chapter->template))
                    <div class="col-3 template_container">
                        <a class="p-0" href="/public/chapters_tasks/{{ $chapter->template }}" download>
                            <i class="bi bi-file-earmark-text-fill submition-icon"></i> Template
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </footer>
@endsection
