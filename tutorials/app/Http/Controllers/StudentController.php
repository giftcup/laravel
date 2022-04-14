<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('students');
    }

    public function show($studentId) {
        // return view('student-details', compact('studentId'));
        return view('student-details')
                ->with('selectedStudentId', $studentId);
    }
}
