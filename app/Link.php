<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = array('name', 'url', 'image', 'image_width', 'image_height', 'sort_order');
}
