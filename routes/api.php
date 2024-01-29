<?php

use App\Http\Controllers\CourseInfoController;
use App\Http\Controllers\EnrollmentCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/course')->group(
    function()
    {
        Route::get('/{id}',[CourseInfoController::class,'show']);
        Route::post('/store',[CourseInfoController::class,'store']);
        Route::put('/update',[CourseInfoController::class,'update']);
        Route::post('/addlesson/{id}',[LessonController::class,'store']);
        Route::post('/join/{id}',[EnrollmentCourseController::class,'joinCourse']);
    }
);