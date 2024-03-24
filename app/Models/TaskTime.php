<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTime extends Model
{
    use HasFactory;

    protected $table = 'task_time';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'task_id',
        'development_time',
        'qa_time',
        'publish_time',
        'full_wasted_time',
        'remaining_time',
        'allowcated_full_time',
    ];

    public $timestamps = false;
}
