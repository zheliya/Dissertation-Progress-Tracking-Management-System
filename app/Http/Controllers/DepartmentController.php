<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
public function add_department(Request $request){
    $validatedData = $request->validate([
        'department' => 'required|string|max:255',
    ]);
        $department = new department();
        $department->name = $validatedData['department'];
        $department->save();

        return redirect()->back();

}

public function getOptions()
{
    $departments = Department::all();
    return response()->json(['departments' => $departments]);
}



}
