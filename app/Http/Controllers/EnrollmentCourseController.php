<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentCourse;
use Illuminate\Http\Request;
use App\Models\Course;

class EnrollmentCourseController extends Controller
{
    /*
        joinCourse : add course to list_course of user
    */
    public function joinCourse($course_id,Request $request)
    {
        $course = Course::find($course_id);
        
        $enrollmentCourse = new EnrollmentCourse;
        $enrollmentCourse->title = $course->title;
        $enrollmentCourse->description = $course->description;
        $enrollmentCourse->lessons = $course->lessons;
        $enrollmentCourse->user_id = $request->user_id;
        $enrollmentCourse->course_id = $course_id;
        // dd($enrollmentCourse);
        $enrollmentCourse->save();
        return Response(['message' => 'success'],200);
    }
    /*
        removeCourse : remove course from list_course of user 
    */
    public function removeCourse($course_id,Request $request)
    {

    }

    /*
        study : get current lesson
    */
    public function study(Request $request)
    {

    }

    public function setGoal($course_id,Request $request)
    {

    }
}
