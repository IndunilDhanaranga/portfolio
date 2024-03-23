<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'type_id',
        'client_id',
        'estimate',
        'repository',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public function projectTypeDetails() {
        return $this->hasOne( ProjectType::class, 'id', 'type_id' );
    }

    public function clientDetails() {
        return $this->hasOne( ProjectClient::class, 'id', 'client_id' );
    }

    public function projectStatusDetails() {
        return $this->hasOne( ProjectStatus::class, 'id', 'status' );
    }

    public function imageDetails() {
        return $this->hasMany( ProjectImage::class, 'project_id', 'id' );
    }
}
