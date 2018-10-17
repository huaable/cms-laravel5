<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function say()
    {
        return $this->belongsTo(\App\Says::class);
    }

    public function fans_count()
    {
        return $this->hasMany(\App\Fans::class, 'star_id', 'id')->where('star_id', '=', $this->id)->count();
    }

    public function activations()
    {
        return $this->hasOne(\App\UserActivation::class);
    }

    public static function sendActivationsEmail()
    {

        // 生成唯一 token
        $token = bcrypt(auth()->user()->email . time());
        $user = auth()->user();

        // 发送邮件
        \Mail::send('emails.activation', compact('user', 'token'), function ($message) {

            $message->to(auth()->user()->email)
                ->subject('blog demo 请您激活账户');
        });

        // 数据库保存 token
        if ($user->activations) {
            $user->activations()->update(['token' => $token]);
        } else {
            $user->activations()->save(new UserActivation([
                'token' => $token
            ]));
        }

    }
    public function addActivationsData($token)
    {
        if ($this->activations) {
            $this->activations()->update(['token' => $token]);
        } else {
            $this->activations()->save(new \App\UserActivation([
                'token' => $token
            ]));
        }
    }
}
