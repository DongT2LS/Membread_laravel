<?php

namespace App\Http\Controllers;

use App\DTOs\CourseDTO;
use App\Services\CourseInfoService;
use Illuminate\Http\Request;

class CourseInfoController extends Controller
{
    protected $courseInfoService;

    public function __construct(CourseInfoService $courseInfoService) {
        $this->courseInfoService = $courseInfoService;
    }
    public function index()
    {

    }

    public function store(Request $request)
    {
        $course = new CourseDTO;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->type = $request->type;
        $course->author = $request->author;

        $this->courseInfoService->store($course);
    }

    public function update(Request $request)
    {
        $course = new CourseDTO;
        $course->id = $request->id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->type = $request->type;
        $course->author = $request->author;

        $course = $this->courseInfoService->update($course);
    }

    public function show($id)
    {
        $this->courseInfoService->show($id);
    }
}
