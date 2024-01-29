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
        return Response($lesson, 200);
    }
    public function store($course_id, Request $request)
    {
        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->elements = $request->elements;
        $lesson->type = $request->type;
        $lesson->course_id = $course_id;
        $lesson->save();

        $course = Course::find($course_id);
        $course->lessons()->associate($lesson);
        $course->save();
        return Response(['message' => 'success'], 200);
    }
    public function update($lesson_id, Request $request)
    {
        $lesson = Lesson::find($lesson_id);
        $lesson->title = "30/1/2024";
        $lesson->save();


        $course = Course::find($lesson->course_id);
        $course->lessons()->associate($lesson);
        $course->save();

        return Response(['message' => 'success'], 200);
    }
    public function delete($lesson_id)
    {
        if ($lesson = Lesson::find($lesson_id)) {
            $lesson->delete();
            return Response(['message' => 'Success']);
        }
        return Response(['message' => 'Not found']);
    }
}
