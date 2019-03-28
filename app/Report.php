<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = ['start_duration', 'end_duration', 'user_id'];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function users()
	{
	  return $this->belongsToMany(User::class);
	}
}
