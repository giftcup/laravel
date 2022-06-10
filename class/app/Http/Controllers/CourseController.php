<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses($deptId) {
        $courses = [];
        $courses = Course::with('department')->where('department.id' == $deptId)->get();

    }

    public function storeCourse(Request $req)
    {
        $data = $req->all();

        $course = new Course;
        $course->courseName = $data['courseName'];
        $course->courseCode = $data['courseCode'];
        $course->deptId = $data['deptId'];

        $course->save();

        return;
    }

    public function deleteCourse($courseId)
    {
        Course::destroy($courseId);
    }
}
