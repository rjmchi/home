<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = array('name', 'url', 'notes', 'sort_order');
}
