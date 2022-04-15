<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {

        // $students = [
        //     ['id' => 1, 'name' => 'Ngewung Sonia', 'score' => 89],
        //     ['id' => 2, 'name' => 'Acha Rha\'ah', 'score' => 69],
        //     ['id' => 3, 'name' => 'Edwin Bimela', 'score' => 75],
        //     ['id' => 4, 'name' => 'Fongoh Martin', 'score' => 38],
        //     ['id' => 5, 'name' => 'John Doe', 'score' => 40],
        //     ['id' => 6, 'name' => 'Nji Daniel', 'score' => 57],
        // ];
        
        $students = [];
        $students = Student::where('score', '>', 52)
                ->orderBy('score', 'desc')
                ->get();

        // dd($students);

        return view('students', compact('students'));
    }

    public function create() {
        // echo "Creating new student";
        // $student = new Student;
        // $student->name = 'New student name';
        // $student->score = 24;
        // $student->created_at = Carbon::now();
        // $student->save();

        return view('students.create');
    }

    public function show($studentId) {
        // return view('student-details', compact('studentId'));
        return view('student-details')
                ->with('selectedStudentId', $studentId);
    }

    public function store(Request $request) {

        $data = $request->all();
        
        $student = new Student;
        $student->name = $data['name'];
        $student->score = $data['score'];
        $student->save();

        return redirect()->route('students');
    }
}
