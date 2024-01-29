<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'elements',
        'type',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'coursssss_id');
    }
}
