@extends('layouts.app_admin_user')
@section('content')
<form action="{{ route('UpdateUsers') }}" method="POST">
    @csrf
    <div class="container w-75">
        <div class="container">
            <label for="user_id" class="user_id_input_label text-start d-block">{{ $user->full_name }}</label>
            <input name="supervisor_id" type="number" class="user_id_input d-block ps-3 pe-3 w-100 " id="user_id"
                value="{{ $user->id }}">
        </div>
        <div class="container">
            <div class="form-check">
                <div class="roles_title row text-start ps-0 pe-0">
                    Roles
                </div>
                <div class="row roles_button ms-3">
                    <div class="col">
                        <input class="form-check-input user_role_input" type="checkbox" value=""
                            id="supervisor-checkbox" name="supervisorCheckbox"
                            {{ $isAdmin == 'supervisor' || $isAdmin == 'admin and supervisor' ? 'checked' : '' }}>
                        <label class="form-check-label user_role_label d-flex" for="supervisor-checkbox">
                            Supervisor
                        </label>
                    </div>
                    <div class="col">
                        <input class="form-check-input user_role_input" type="checkbox" value="" id="admin-checkbox"
                            name="adminCheckbox"
                            {{ $isAdmin == 'admin' || $isAdmin == 'admin and supervisor' ? 'checked' : '' }}>
                        <label class="form-check-label user_role_label d-flex" for="admin-checkbox">
                            Admin
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="the_student_input_container"
            class="the_student_input_container {{ $isAdmin == 'admin' ? ' d-none' : '' }}">
            <div class="supervisor_student_inputs_container">
                @if($projects->isEmpty())
                    <p>No projects found for supervisor ID {{ $user->id }}</p>
                @else
                    @foreach($projects as $project)
                        <div class="supervisor_student_inputs container ">
                            <label for="user_id"
                                class="user_id_input_label text-start d-block">{{ $project->student_id }}</label>
                            <input name="student_id[]" type="number"
                                class="supervisor_student_id_input d-block ps-3 pe-3 w-100" id="user_id"
                                value="{{ $project->student_id }}">

                            <select name="department[]" class="department_select">
                                <option value="" disabled selected>Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $project->department == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="add_student_button_container container pt-5 ">
                <button class="add_student_input_button" type="button" onclick="addStudentInput()">Add Student</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </div>
</form>
@endsection


