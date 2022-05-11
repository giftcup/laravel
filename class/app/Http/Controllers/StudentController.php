<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = [];
        $students = Student::all();

        return view('students', compact('students'));
    }

    public function add()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->matricule = $data['matricule'];

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

        return view('edit', compact('student'));
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
