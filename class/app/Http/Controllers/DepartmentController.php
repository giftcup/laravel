<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function storeDepart(Request $request) {
        $data = $request->all();

        $department = new Department;
        $department->deptCode = $data['code'];
        $department->deptName = $data['name'];

        $department->save();

        return redirect()->route('departments');
    }

    public function getDepartments() {
        $departments = [];
        $departments = Department::all();

        return view('department-pages.departments')->with('departs', $departments);
    }
}