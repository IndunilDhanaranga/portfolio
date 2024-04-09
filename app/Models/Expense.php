<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expense';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'expense_type_id',
        'bank_account_id',
        'amount',
        'description',
        'date',
        'created_at',
        'updated_at',
    ];

    public function expenseType() {
        return $this->hasOne( ExpenseType::class, 'id', 'expense_type_id' );
    }
    public function bankDetails() {
        return $this->hasOne( BankAccount::class, 'id', 'bank_account_id' );
    }
    public function attachmentDetails() {
        return $this->hasMany( IncomeAttachment::class, 'income_id', 'id' );
    }
}
