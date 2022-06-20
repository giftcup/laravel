<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function addDepart() {
        return view('department-pages.add-dept');
    }

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

        foreach ($departments as $department) {
            $id = $department['id'];
            $numStudents = Department::find($id)->student->count();
            $department['numOfStudents'] = $numStudents;
        }
        

        return view('department-pages.departments')->with('departs', $departments);
    }

    public function editDeptPage($deptId) {
        $department = [];
        $department = Department::where('id', $deptId)->first();

        return view('department-pages.edit-dept')->with('dpt', $department);
    }

    public function editDepartment(Request $req, $deptId) {
        $data = $req->all();

        Department::where('id', $deptId)
               ->update([
                   'deptCode' => $data['code'],
                   'deptName' => $data['name']
               ]);

        return redirect()->route('departments');
    }

    public function deleteDepartment($deptId) {
        Department::destroy($deptId);

        return redirect()->route('departments');
    }
}
