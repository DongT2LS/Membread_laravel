<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Course extends Model
{
    use HasFactory,HybridRelations,SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'courses';

    protected $fillable = [
        'title',
        'description',
        'lessons',
        'author',
        'type',
        'leader_board'
    ];

    public $timestamps = true;
}
