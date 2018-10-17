<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    public function post()
    {
       return $this->belongsTo(\App\Post::class);
    }
}
