<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $fillable= ['user_id','active','token'];
    public function scopeNotExpired($query)
    {
        return $query->whereBetween('updated_at', [Carbon::now()->subDay(), Carbon::now()]);
    }
}
