<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTeam extends Model {
    use HasFactory;

    protected $table = 'task_team';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'task_id',
        'developer_id',
        'qa_id',
        'publisher_id',
    ];

    public $timestamps = false;

    public function devDetails() {
        return $this->hasOne( User::class, 'id', 'developer_id' );
    }

    public function qaDetails() {
        return $this->hasOne( User::class, 'id', 'qa_id' );
    }

    public function publisherDetails() {
        return $this->hasOne( User::class, 'id', 'publisher_id' );
    }
}
