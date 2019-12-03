<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoreminder extends Model
{
	public function reminder() {
		return $this->hasOne('App\Reminder');
	}
}
