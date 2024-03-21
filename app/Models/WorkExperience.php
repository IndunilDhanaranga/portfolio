<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model {
    use HasFactory;

    protected $table = 'work_experience';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'company',
        'position',
        'from',
        'to',
        'created_at',
        'updated_at',
    ];
}
