<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = array('name','url','client_id');
	
    public function links() {
		return $this->hasMany('\App\Client');
	}
}
