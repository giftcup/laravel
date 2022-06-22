<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Mail\StudentAuthentication;
use Illuminate\Support\Facades\Mail;
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

        /** 
         * getting the department_id to add as a foreign key
         * in student
        */
        if ($department == null) :
            $student->department_id = null;
        else :
            $dept = json_decode($department);
            $student->department_id = $dept->id;
        endif;

        $student->save();
        $studentId = $student->id;

        return redirect()->route('send-email', ['id' => $studentId, 'email' => $student->email]);
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

    public function emailConfirmation($studentId, $studentEmail) {
        Mail::to($studentEmail)->send(new StudentAuthentication($studentId));
        return redirect()->route('students');
    }

}
