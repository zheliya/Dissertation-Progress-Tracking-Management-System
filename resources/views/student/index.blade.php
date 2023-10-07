@extends('layouts.app_student')

@section('content')
<br><br>
<div class="container submition-container">
    <div class="row submition-background">
        <div class="col-md-1 text-start">
            <a href="/public/chapters_tasks/{{ $chapters->submition }}" download>
                <i class="bi bi-file-earmark-text-fill submition-icon"></i>
            </a>
        </div>
        <div class="col-md-7 text-start m-auto ps-1 submition-title">{{ $chapters->submition }}</div>
        <div class="col-md-4 m-auto text-end submition-date">date {{ $chapters->updated_at }}</div>
    </div>
    <div class="row p-3">
        <div class="row">
            <div class="col text-start submition-deadline-title">
                deadline
            </div>
        </div>
        <div class="row ps-4 ">
            <div class="col text-start submition-deadline">11-12-2022 23:59:59</div>
            <div class="col text-end submition-deadline-time-left">15 days 11 hours 45 minutes left</div>
        </div>
        <div class="row text-end">
            <button type="button" class="btn btn-primary" class="add-task" data-bs-target="#SubmitFile"
                data-bs-toggle="modal">
                Submit file
            </button>
        </div>
    </div>
</div>


<div class="modal fade " id="SubmitFile" aria-hidden="true" aria-labelledby="SubmitFileLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content add-task-model">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="fileSubmition" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">

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
                    <div class="progress-bar main-progress-bar-input-scale" id="progressBar" style="width: 50%">
                        <value class="main-progress-bar-input-value" id="progressValue">50%</value>
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
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                asdfad fasd fasd as fdasdfmdo
            </a>
        </div>
    </div>
    <hr class="underline mt-2 m-auto">
    <div class="statement-text-container p-4 pt-3 container text-start">
        <div class="statment-container" id="statment-container">
            {!! $chapters->supervisor_statement !!}
        </div>
    </div>
</div>
<br>
<div class="container m-auto align-middle student-statement-container">
    <div class="row pt-2">
        <div class="col ">
            <a href="#" class="d-flex align-items-center text-decoration-none statement-porfile-text"
                aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                asdfad fasd fasd as fdasdfmdo
            </a>
        </div>
        <div class="col align-middle align-items-center text-end m-auto">
            <button class="edit-button" onclick="myFunction()">Edit</button>
            <button class="update-button">Update</button>
        </div>
    </div>
    <hr class="underline mt-2 m-auto">
    <div class="statement-text-container p-4 pt-3 container text-start">
        <div class="statment-container" id="statment-container">
            {!! $chapters->student_statement !!}
        </div>
        <div class="statment-edit-container p-0 m-0" id="statment-edit-container">
            <form method="POST" action="updatestusta" class="p-0 m-0" id="update-text-form">
                @csrf
                {{ csrf_field() }}
                <textarea v-model="content" id="tinymcestatement" class="tinymce-editor "
                    name="student_statement">{{ $chapters->student_statement }}</textarea>
                <input class="btn btn-primary submit-edit" type="submit" name="update" value="UPDATE">
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script
                src="https://cdn.tiny.cloud/1/cgiq8otbdluv9r66h1nllvbv6luez5dzulkdisjj5g4uphcn/tinymce/6/tinymce.min.js"
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


        @foreach($chapters->history_files as $history_file)

            <div class="row history_file_row mb-3 mt-3" >
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

<br><br><br><br><br><br>


@endsection
