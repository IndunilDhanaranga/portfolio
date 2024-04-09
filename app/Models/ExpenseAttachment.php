<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseAttachment extends Model
{
    use HasFactory;

    protected $table = 'expense_attachment';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'expense_id',
        'attachment_name',
        'created_at',
        'updated_at',
    ];
}
