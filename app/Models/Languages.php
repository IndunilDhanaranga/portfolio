<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;

    protected $table = 'languages';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'languages',
        'percentage',
        'created_at',
        'updated_at',
    ];
}
