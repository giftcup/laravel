<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = [];
        $students = Student::all();

        foreach ($students as $student) :
            $id = $student['id'];
            $department = Student::find($id)->department;
            if ($department == null) :
                $student['department'] = null;
            else: 
                $student['department'] = $department['deptName'];
            endif;
        endforeach;

        return view('student-pages.students', compact('students'));
    }

    public function add()
    {
        $departments = [];
        $departments = Department::all();

        return view('student-pages.add', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->matricule = $data['matricule'];
        $department = $data['department'];

        if ($department == null) :
            $student->department_id = null;
        else :
            $dept = json_decode($department);
            $student->department_id = $dept->id;
        endif;

        $student->save();

        return redirect()->route('students');
    }

    public function deleteStudent($studentId)
    {
        Student::destroy($studentId);

        return redirect()->route('students');
    }

    public function edit($studentId)
    {
        $student = [];
        $student = Student::find($studentId);
        $studentDept = Student::find($studentId)->department;

        $departments = [];
        $departments = Department::all();

        return view('student-pages.edit', compact('student', 'departments', 'studentDept'));
    }

    public function editStudent(Request $request, $studentId)
    {
        $data = $request->all();
        $department = $data['department'];

        if ($department !== null) :
            $dept = json_decode($department);
        endif;

        Student::where('id', $studentId)
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'matricule' => $data['matricule'],
                'department_id' => $dept->id
            ]);

        return redirect()->route('students');
    }
}
