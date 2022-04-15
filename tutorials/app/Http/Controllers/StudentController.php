<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {

        $students = [
            ['id' => 1, 'name' => 'Ngewung Sonia', 'score' => 89],
            ['id' => 2, 'name' => 'Acha Rha\'ah', 'score' => 69],
            ['id' => 3, 'name' => 'Edwin Bimela', 'score' => 75],
            ['id' => 4, 'name' => 'Fongoh Martin', 'score' => 38],
            ['id' => 5, 'name' => 'John Doe', 'score' => 40],
            ['id' => 6, 'name' => 'Nji Daniel', 'score' => 57],
        ];

        return view('students', compact('students'));
    }

    public function show($studentId) {
        // return view('student-details', compact('studentId'));
        return view('student-details')
                ->with('selectedStudentId', $studentId);
    }
}
