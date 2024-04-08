<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeAttachment extends Model
{
    use HasFactory;

    protected $table = 'income_attachment';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'income_id',
        'attachment_name',
        'created_at',
        'updated_at',
    ];
}
