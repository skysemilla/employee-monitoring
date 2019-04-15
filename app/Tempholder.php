<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempholder extends Model
{
    //
    protected $fillable = ['oldcat_id', 'newcat_id', 'oldprojname_id', 'newprojname_id'];
}
