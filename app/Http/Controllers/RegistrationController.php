<?php

namespace App\Http\Controllers;

use App\UserActivation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{


    public function send()
    {
//        \Auth()->user()->sendActivationsEmail();
        \App\User::sendActivationsEmail();
        // 发送并保存成功，跳转到主页
        return back();
    }

    public function active()
    {
        $token = request('verify');
        $rs = UserActivation::where('token', $token)
            ->whereBetween('updated_at', [Carbon::now()->subDay(), Carbon::now()]);
        if ($rs->exists()) {
            $rs->update(['active' => true]);
            return redirect('/login');
        }

        return redirect('/');
    }
}
