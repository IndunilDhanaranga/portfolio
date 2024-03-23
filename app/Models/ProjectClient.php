<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectClient extends Model
{
    use HasFactory;

    protected $table = 'project_client';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
