<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioUserConnection extends Model {
    use HasFactory;

    protected $table = 'portfolio_user_connection';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'user_id',
        'platform',
        'link',
        'icon',
        'created_at',
        'updated_at',
    ];
}
