<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    protected $table = 'user_image';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'user_id',
        'image_name',
        'created_at',
        'updated_at',
    ];
}
