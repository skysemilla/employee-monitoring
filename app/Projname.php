<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projname extends Model
{
    //
    protected $fillable = ['name','user_id', 'report_id'];
    
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
