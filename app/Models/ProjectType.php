<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $table = 'project_type';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'type',
        'created_at',
        'updated_at',
    ];

    public function technologyDetails() {
        return $this->hasMany( Technology::class, 'project_type_id', 'id' );
    }


}
