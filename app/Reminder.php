<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reminder extends Model
{
	protected $fillable = array('due_date', 'message');
	protected $dates = ['due_date'];
	
    public function setDuedateAttribute($due_date) {
        $this->attributes['due_date'] = Carbon::parse($due_date);
    }	
}
