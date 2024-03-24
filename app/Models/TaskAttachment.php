<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAttachment extends Model
{
    use HasFactory;

    protected $table = 'task_attachment';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'task_id',
        'attachment_name',
        'created_at',
        'updated_at',
    ];
}
