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
        $students = Student::with('department')->get();
        // $students = Student::all();

        // $students = $students->with('department')->get();

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
        
        if ($department == null):
            $student->deptCode = null;
        else:
            $dept = json_decode($department);
            $student->deptCode = $dept->id;
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
        $student = Student::where('id', $studentId)->first();

        $departments = [];
        $departments = Department::all();

        return view('student-pages.edit', compact('student', 'departments'));
    }

    public function editStudent(Request $request, $studentId)
    {
        $data = $request->all();

        Student::where('id', $studentId)
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'matricule' => $data['matricule']
            ]);

        return redirect()->route('students');
    }
}
