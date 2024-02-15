<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Relations\HasMany;


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
        'leader_board',
        'attr'
    ];

    public $timestamps = true;

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function addLessonId($id)
    {
        return $this->push('lessons',$id);
    }
}
