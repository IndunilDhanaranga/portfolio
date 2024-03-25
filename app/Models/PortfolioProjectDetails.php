<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioProjectDetails extends Model
{
    use HasFactory;

    protected $table = 'portfolio_project_details';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'project_id',
        'video_name',
        'image_name',
        'created_at',
        'updated_at',
    ];
    
}
