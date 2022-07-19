<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;
use Image;

class StudentController extends Controller
{
    public function signupPage() {
        return view('auth.signup');
    }

    public function signup(Request $request) {
        $request->validate([
            'matricule' => ['required'],
            'verification_code' => ['required'],
            'password' => ['required', 'confirmed']
        ]);
        // dd([$matricule, $request['password']]);
        
        Student::where('matricule', $request['matricule'])
               ->where('verification_code', $request['verification_code'])
                ->update([
                    'password' => Hash::make($request['password'])
                ]);
        
        return redirect()->route('students');
    }

    public function index(Request $request)
    {
        $order_by = "created_at";
        $order = "DESC";
        $search_field = 'name';
        $search = null;

        if ($request->has('order_by')) {
            $order_by = $request->order_by;
            $order = $request->order;
            $search = $request->search;
        }

        $studs = Student::select(['students.*', 'departments.deptName as dept_name'])
            ->leftJoin('departments', 'students.department_id', 'departments.id')
            ->orderBy($order_by, $order)
            ->where('students.name' , 'LIKE', '%' . $search . '%')
            ->orWhere('students.matricule', 'LIKE', '%' . $search . '%')
            ->orWhere('departments.deptName', 'LIKE', '%' . $search . '%')  
            ->get();

        return view('student-pages.students', compact('order_by', 'order', 'search_field', 'search'))->with('students', $studs);
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
            'email' => ['required', 'unique:students'],
            'matricule' => ['required', 'unique:students,matricule'],
            'department' => ['required'],
            'profile' => ['nullable', 'mimes:jpg, png, jpeg', 'max:50482']
        ]);

        $verification_code = uniqid();

        $data = $request->all();
        $height = config('image.height', 100);
        $width = config('image.width', 100);

        $image = $request->profile;
        $newImageName = null;
        if ($image != null) {
            $newImageName = time() . '-' . $data['matricule'] . '.' . $data['profile']->extension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize($width, $height);
            $image_resize->save(public_path('images/' . $newImageName));
        }

        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->matricule = $data['matricule'];
        $student->image_path = $newImageName;
        $student->verification_code = $verification_code;
        $department = $data['department'];

        /** 
         * getting the department_id to add as a foreign key
         * in student
         */
        if ($department == null)
            $student->department_id = null;
        else {
            $dept = json_decode($department);
            $student->department_id = $dept->id;
        }

        $student->save();
        SendEmail::dispatch($student);

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

    public function editStudent(Request $request,  Student $studentId)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:students'],
            'matricule' => ['required', 'unique:students,matricule'],
            'department' => ['required']
        ]);

        $data = $request->all();
        $department = $data['department'];

        if ($department !== null) {
            $dept = json_decode($department);
        }

        $studentId
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

        foreach ($courses as $courseId) {
            $course = Course::find($courseId);
            $student->course()->attach($course);
        }

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