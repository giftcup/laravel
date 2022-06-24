<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses() {
        return 'hello world';
    }

    public function addCourse() {
        $departments = [];
        $departments = Department::all();
        // return $departments;

        return view('course-pages.addCourse', compact('departments'));
    }

    public function storeCourse(Request $req)
    {
        $data = $req->all();

        $course = new Course;

        $dep = $data['department'];
        $dept = json_decode($dep);

        $course->deptId = $dept->id;
        $course->courseName = $data['courseName'];
        $course->courseCode = $data['courseCode'];

        $course->save();

        return redirect()->route('add.course');
    }

    public function deleteCourse($courseId)
    {
        Course::destroy($courseId);
    }
}
