<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PortfolioUser extends Model
{
    use HasFactory;

    protected $table = 'portfolio_user';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'f_name',
        'd_name',
        'b_date',
        'p_number',
        'address',
        'email',
        'm_path',
        'caption',
        'about',
        'created_at',
        'updated_at',
    ];

    public function connections() {
        return $this->hasMany( PortfolioUserConnection::class, 'user_id', 'id' );
    }

    public function userImage() {
        return $this->hasOne( PortfolioUserImage::class, 'user_id', 'id' );
    }

    public function coverImage() {
        return $this->hasOne( PortfolioCoverImage::class, 'user_id', 'id' );
    }
}
