@extends('layouts.app_admin_links')

@section('content')


 <div class="container w-75">
    <a class="btn btn-primary d-table go_back_button">goback</a>
    @foreach ($users as $user)
        <a class="text-decoration-none" href="{{ url('/user/' . $user->id) }}">
            <div class="container project_container grid  text-start p-4 pt-3 mb-5 mt-5 m-auto">
                <div class="row grid ">
                            <div class="col m-auto p-0">

                                <span><img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong class="student_full_name">{{ $user->full_name }}</strong>
                                </span>
                                &nbsp;
                                <span class="student_email">{{ $user->email }}</span>
                                &nbsp;
                                <span class="student_department">{{ $user->department }}</span>
                            </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
