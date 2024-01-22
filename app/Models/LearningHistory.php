<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class LearningHistory extends Model
{
    use HasFactory,HybridRelations,SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'learninghistories';

    protected $fillable = [
        'type',
        'score',
        'result'
    ];

    public $timestamps = true;
}
