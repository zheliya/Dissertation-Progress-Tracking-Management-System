@extends('layouts.app_admin_links')

@section('content')
{{-- <div class="container w-75 m-auto position-absolute top-50 start-50 translate-middle">
    @foreach ($users as $user)
        <div class="row justify-content-center project_container grid mb-5 m-auto ">
            <a href="{{ url('/user/' . $user->id) }}" class="text-decoration-none text-start">

                <span>
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong class="student_full_name">{{ $user->full_name }}</strong>
                </span>
                <span class="student_email">{{ $user->email }}</span>
                <span class="student_department">{{ $user->department }}</span>

            </a>
        </div>
    @endforeach
</div> --}}

 <div class="container w-75">
    <a class="btn btn-primary d-table go_back_button">goback</a>
    @foreach ($departments as $department)
        <a class="text-decoration-none" href="{{ url('/department/' . $department->id) }}">
            <div class="container project_container grid  text-start p-4 pt-3 mb-5 mt-5 m-auto">
                <div class="row grid ">
                            <div class="col m-auto p-0">

                                <span><img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong class="student_full_name">{{ $department->name }}</strong>
                                </span>
                            </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
