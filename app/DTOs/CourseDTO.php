<?php

namespace App\DTOs;

use App\Models\Course;

/**
 * CourseDTO
 * Declare info of course for user and some function
 * about courseDTO 
 */
class CourseDTO {
    public $id;
    public $title;
    public $description;
    public $type;
    public $author;
    public $lessons;
    public $participants;
    public static function createCourseDTO(Course $course) : CourseDTO
    {
        $courseDTO = new CourseDTO;
        $courseDTO->id = $course->id;
        $courseDTO->title = $course->title;
        $courseDTO->description = $course->description;
        $courseDTO->type = $course->type;
        $courseDTO->author = $course->author;
        $courseDTO->lessons = $course->lessons;
        $courseDTO->participants = $course->participants;
        return $courseDTO;
    }
}
