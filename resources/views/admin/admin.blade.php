@extends('layouts.app_admin_links')

@section('content')

<div class="container w-75 m-auto position-absolute top-50 start-50 translate-middle">
    <div class="row justify-content-evenly row_height_container">
        <div class="col m-2 container project_container grid d-flex align-items-center justify-content-center">
            <a href="{{ url('/users') }}" class="text-decoration-none">
                edit users
            </a>
        </div>
        <div class="col m-2 container project_container grid d-flex align-items-center justify-content-center">
            <a href="{{ url('/departments') }}" class="text-decoration-none">
                department
            </a>
        </div>
    </div>
</div>

{{-- <div class="container w-75">
    <a class="btn btn-primary d-table go_back_button">goback</a>
    @foreach($projects as $project)
        <a class="text-decoration-none" href="{{ url('/ProjectQuery/' . $project->id ) }}">
            <div class="container project_container grid  text-start p-4 pt-3 mb-5 mt-5 m-auto">
                <div class="row grid ">
                    @foreach($students as $student)
                        @if($student->id === $project->student_id)
                            <div class="col m-auto p-0">
                                <!--  <a href="{{ url('/ProjectQuery/' ) }}"
                                class=" align-items-center text-decoration-none "> -->
                                <span><img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong class="student_full_name">{{ $student->full_name }}</strong>
                                </span>
                                &nbsp;
                                <span class="student_email">{{ $student->email }}</span>
                                &nbsp;
                                <span class="student_department">{{ $student->department }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row p-1 pt-2 ps-5 student_project_title">{{ $project->title }}</div>
                <div class="row ps-5 ms-2 student_project_sub_title ">{{ $project->subtittle }}</div>
            </div>
        </a>
    @endforeach
</div> --}}


@endsection
