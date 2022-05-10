<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = [];
        $students = Student::all();

        return view('students', compact('students'));
    }

    public function add() {
        return view('add');
    }

    public function store(Request $request) {
        $data = $request->all();
        
        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->matricule = $data['matricule'];

        $student->save();

        return redirect()->route('students');
    }
}
