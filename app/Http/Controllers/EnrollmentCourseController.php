<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentCourse;
use Illuminate\Http\Request;
use App\Models\Course;

/**
 * EnrollmentCourseController
 * 
 */

class EnrollmentCourseController extends Controller
{
    /*
        joinCourse : add course to list_course of user
    */
    public function joinCourse($course_id, Request $request)
    {
        if ($course = Course::find($course_id)) {
            $enrollmentCourse = new EnrollmentCourse;
            $enrollmentCourse->title = $course->title;
            $enrollmentCourse->description = $course->description;
            $enrollmentCourse->lessons = [$course->lessons];
            $enrollmentCourse->user_id = $request->user_id;
            $enrollmentCourse->course_id = $course_id;
            $enrollmentCourse->goal = 5;
            $enrollmentCourse->save();
            return Response(['message' => 'success', 'enrollmentCourse' => $enrollmentCourse], 200);
        }

        return Response(['message', 'Course not exist']);
    }

    public function restoreCourse($enrollmentcourse_id)
    {
        if ($enrollmentCourse = EnrollmentCourse::withTrashed()->find($enrollmentcourse_id)) {
            $enrollmentCourse->restore();
            return Response(['message' => 'success']);
        }
        return Response(['message' => 'Not found']);
    }
    /*
        removeCourse : remove course from list_course of user 
    */
    public function removeCourse($enrollmentcourse_id)
    {
        if ($enrollmentcourse = EnrollmentCourse::find($enrollmentcourse_id)) {
            $enrollmentcourse->delete();
            return Response(['message' => 'success']);
        }
        return Response(['message' => 'Not found']);
    }

    /*
        study : get current lesson
    */
    public function study(Request $request)
    {
        
    }

    public function setGoal($enrollmentcourse_id, Request $request)
    {
        if($enrollmentCourse = EnrollmentCourse::find($enrollmentcourse_id))
        {
            $enrollmentCourse->goal = $request->goal;
            $enrollmentCourse->save();
            return Response(['message'=>'success']);
        }
        return Response(['message'=>'Not found']);
    }
}
