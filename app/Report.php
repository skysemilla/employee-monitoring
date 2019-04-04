<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = ['duration', 'year', 'user_id'];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function users()
	{
	  return $this->belongsToMany(User::class);
	}
}
