<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'post_id',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function post()
    {
        return $this->belongsTo(\App\Post::class);
    }
}
