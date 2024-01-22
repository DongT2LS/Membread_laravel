<?php

namespace App\DTOs;

use App\Models\Course;

class CourseDTO {
    public $id;
    public $title;
    public $description;
    public $type;
    public $author;
    public $lessons;        
}
