<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAndCollage extends Model
{
    use HasFactory;

    protected $table = 'schools_and_collage';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'from',
        'to',
        'created_at',
        'updated_at',
    ];
}
