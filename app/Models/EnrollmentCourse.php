<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class EnrollmentCourse extends Model
{
    use HasFactory,HybridRelations,SoftDeletes;
    protected $connection = 'mongodb';
    protected $fillable = [
        'title',
        'description',
        'lessons',
        'author',
        'type',
        'leader_board',
        'goal',
        'score',
        'day_score',
        'week_score',
        'month_score'
    ];

    public $timestamps = true;
}
