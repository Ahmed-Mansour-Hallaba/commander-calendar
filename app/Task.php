<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';

    public function creator(){
        return $this->belongsTo(User::Class,'creator_id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'users_tasks', 'task_id', 'user_id')
            ->withPivot('status');
    }
}
