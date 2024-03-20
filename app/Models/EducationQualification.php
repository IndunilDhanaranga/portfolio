<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationQualification extends Model {
    use HasFactory;

    protected $table = 'education_qualification';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'education_level',
        'school',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

    public function educationDetails() {
        return $this->hasOne( EducationLevel::class, 'id', 'education_level' );
    }

    public function schoolDetails() {
        return $this->hasOne( SchoolAndCollage::class, 'id', 'school' );
    }

}
