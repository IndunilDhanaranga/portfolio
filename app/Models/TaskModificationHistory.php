<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModificationHistory extends Model
{
    use HasFactory;

    protected $table = 'task_modification_history';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'task_id',
        'status',
        'start_time',
        'end_time',
        'duration',
        'created_at',
        'updated_at',
    ];
}
