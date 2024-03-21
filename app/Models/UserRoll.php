<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoll extends Model
{
    use HasFactory;

    protected $table = 'user_roll';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
