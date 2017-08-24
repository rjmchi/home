<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
	protected $fillable = array('due_date', 'message');
}
