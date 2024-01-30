<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'comments';

    protected $fillable = [
        'course_id',
        'user_id',
        'comment'
    ];

    public $timestamps = true;
}
