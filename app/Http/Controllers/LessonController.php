<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return Response($lesson,200);
    }

    /*
        var i;
    */
    public function store($course_id,Request $request)
    {
        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->elements = $request->elements;
        $lesson->type = $request->type;
        // $lesson->save();

        $course = Course::find($course_id);
        $course->lessons()->save($lesson);
        // $course->save();
        return Response(['message' => 'success'],200);
    }
    public function update($lesson_id,Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson-> title = "29/1/2024";
        $lesson->save();

        // $course = 
    }
    public function delete(Request $request)
    {
        
    }
}
