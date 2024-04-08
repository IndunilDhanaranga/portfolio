<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TansactionHistory extends Model
{
    use HasFactory;

    protected $table = 'transaction_history';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'transaction_id',
        'bank_account_id',
        'transaction_type',
        'amount',
        'date',
        'created_at',
        'updated_at',
    ];
}
