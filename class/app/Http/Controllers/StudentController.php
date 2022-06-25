<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
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
            else :
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
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'matricule' => ['required', 'unique:students,matricule'],
            'department' => ['required'],
            'profile' => ['required', 'mimes:jpg, png, jpeg', 'max:50482']
        ]);

        $data = $request->all();

        $newImageName = time().'-'.$data['matricule'].'.'.$data['profile']->extension();
        $data['profile']->move(public_path('images'), $newImageName);

        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->matricule = $data['matricule'];
        $student->image_path = $newImageName;
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

        SendEmail::dispatch($student->email, $student->id)->onQueue('emails');

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

    public function registerCourses()
    {
        $courses = [];
        $courses = Course::all();

        return view('student-pages.register-courses', compact('courses'));
    }

    public function saveCourse(Request $req, $studentId)
    {
        $data = $req->all();
        $courses = $data['course'];

        $student = Student::find($studentId);

        foreach ($courses as $courseId) :
            $course = Course::find($courseId);
            $student->course()->attach($course);
        endforeach;
        return redirect()->route('students');
    }

    public function studentInfo($studentId)
    {
        $student = [];
        $student = Student::find($studentId);
        $department = Student::find($studentId)->department;
        $course = $student->course;
        $student['department'] = $department->deptName;
        return ($student);
        // return ($courses);
    }
}
