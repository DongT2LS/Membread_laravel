<?php

use App\Http\Controllers\CourseInfoController;
use App\Http\Controllers\EnrollmentCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\AuthController;
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



Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);
Route::middleware('guest')->group(
    function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
    }
);


// Route::post('password/email',  ForgotPasswordController::class);
// Route::post('password/reset', ResetPasswordController::class);

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

Route::prefix('/lesson')->group(
    function()
    {
        Route::get('/{id}',[LessonController::class,'show']);
        Route::put('/update/{id}',[LessonController::class,'update']);
        Route::post('/delete/{id}',[LessonController::class,'delete']);
    }
);

Route::prefix('enrollment')->group(
    function()
    {
        Route::post('/remove/{id}',[EnrollmentCourseController::class,'removeCourse']);
        Route::post('/restore/{id}',[EnrollmentCourseController::class,'restoreCourse']);
        Route::post('/goal/{id}',[EnrollmentCourseController::class,'setGoal']);
    }
);