<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'project_id',
        'task_category_id',
        'title',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public function projectDetails(){
        return $this->hasOne( Project::class, 'id', 'project_id' );
    }

    public function taskCategoryDetails(){
        return $this->hasOne( TaskCategory::class, 'id', 'task_category_id' );
    }

    public function taskStatusDetails(){
        return $this->hasOne( TaskStatus::class, 'id', 'status' );
    }

    public function taskTimeDetails(){
        return $this->hasOne( TaskTime::class, 'task_id', 'id' );
    }

    public function taskTeamDetails(){
        return $this->hasOne( TaskTeam::class, 'task_id', 'id' );
    }

    public function taskAttachmentDetails(){
        return $this->hasMany( TaskAttachment::class, 'task_id', 'id' );
    }
}
