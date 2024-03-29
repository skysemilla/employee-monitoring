<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['title','category_id', 'target_no', 'actual_no', 'rating_quantity', 'rating_timeliness', 'rating_effort', 'remarks','header_id', 'report_id', 'user_id', 'projname_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

  /*  public function getCategory(){

    	return $this
    }*/
    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
