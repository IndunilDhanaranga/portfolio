<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'income';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'income_type_id',
        'project_id',
        'bank_account_id',
        'amount',
        'description',
        'date',
        'created_at',
        'updated_at',
    ];

    public function incomeType() {
        return $this->hasOne( IncomeType::class, 'id', 'income_type_id' );
    }
    public function projectDetails() {
        return $this->hasOne( Project::class, 'id', 'project_id' );
    }
    public function bankDetails() {
        return $this->hasOne( BankAccount::class, 'id', 'bank_account_id' );
    }
    public function attachmentDetails() {
        return $this->hasMany( IncomeAttachment::class, 'income_id', 'id' );
    }
}
