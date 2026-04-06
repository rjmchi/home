<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $guarded = [];

    public function scopeOrderByName($query){
        return $query->orderByRaw('LOWER(name) ASC');
    }
}
