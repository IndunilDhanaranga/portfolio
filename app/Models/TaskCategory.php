<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $table = 'task_category';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'category',
        'created_at',
        'updated_at',
    ];
}
