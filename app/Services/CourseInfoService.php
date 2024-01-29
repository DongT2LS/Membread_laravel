<?php

namespace App\Services;

use App\DTOs\CourseDTO;
use App\Models\Course;
/**
 * CourseInfoService
 * Declare some function for CourseInfoController
 */
class CourseInfoService
{
    public function store(CourseDTO $courseDTO)
    {
        $course = new Course;
        $course->title = $courseDTO->title;
        $course->description = $courseDTO->description;
        $course->type = $courseDTO->type;
        $course->author = $courseDTO->author;
        $course->save();
    }
    public function update(CourseDTO $courseDTO){
        $course = Course::find($courseDTO->id);

        $courseUpdate = [];
        $courseDTO->title && $courseUpdate['title'] = $courseDTO->title;
        $courseDTO->description &&$courseUpdate['description'] = $courseDTO->description;
        $courseDTO->type && $courseUpdate['type'] = $courseDTO->type;
        $course->update($courseUpdate);
    }
    public function show($id) : CourseDTO
    {
        $course = Course::find($id);
        $courseDTO = CourseDTO::createCourseDTO($course);
        return $courseDTO;
    }
}