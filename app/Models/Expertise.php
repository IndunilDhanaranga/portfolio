<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $table = 'expertise';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'short_title',
        'icon',
        'description',
        'created_at',
        'updated_at',
    ];
}
