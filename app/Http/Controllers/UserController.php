<?php

namespace App\Http\Controllers;

use App\Models\user_role;
use Illuminate\Http\Request;
use App\Models\chapter;
use App\Models\project;
use App\Models\User;
use App\Models\role;
use App\Models\department;



class UserController extends Controller
{
    public function link_student_supervisor(){
        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('role_id', ['1']);
        })->get();


        return view('admin.link_student_supervisor_home',compact('users'));

    }
    public function get_user($user_id){
        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('role_id', ['1']);
        })->get();

        $user = User::findOrFail($user_id);
        $isAdmin = false;
        $isSupervisor = false;
        $isStudent = false;

        foreach ($user->roles as $role) {
            if ($role->name == 'admin') {
                $isAdmin = true;
            } else if ($role->name == 'supervisor') {
                $isSupervisor = true;
            } else if ($role->name == 'student') {
                $isStudent=true;
            }
        }
        if ($isAdmin && $isSupervisor) {
            $isAdmin = 'admin and supervisor';
        } else if ($isAdmin) {
            $isAdmin = 'admin';
        } else if ($isSupervisor) {
            $isAdmin = 'supervisor';
        } else if ($isStudent) {
            $isAdmin = 'student';
        } else {
            $isAdmin = 'regular user';
        }

        $projects = Project::where('supervisor_id', $user_id)->get();

        $departments = department::orderBy('name','asc')->get();

        return view('admin.link_student_supervisor',compact('users','user','isAdmin','projects','departments'));
    }



    public function admin(){


        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('role_id', ['1']);
        })->get();

        return view('admin.admin',compact('users'));

    }
    public function users(){

        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('role_id', ['1']);
        })->get();

        return view('admin.users',compact('users'));

    }
    public function departments(){


        $departments = department::orderBy('name','asc')->get();
        return view('admin.departments', compact('departments'));


    }


    public function edit_student_supervisor(){

    }
    public function add_user(){

    }
    public function edit_user(){

    }
    public function edit_user_role(){

    }


    public function form_link_student_supervisor(){

    }
    public function form_edit_student_supervisor(){

    }
    public function form_add_user(){

    }
    public function form_edit_user(){

    }
    public function form_edit_user_role(){

    }
}
