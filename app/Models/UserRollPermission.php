<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRollPermission extends Model
{
    use HasFactory;

    protected $table = 'user_roll_permission';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'user_roll_id',
        'permission',
        'created_at',
        'updated_at',
    ];
}
