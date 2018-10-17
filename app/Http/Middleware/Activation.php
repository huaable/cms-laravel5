<?php

namespace App\Http\Middleware;

use Closure;

class Activation
{
    /**
     * 检查登录用户是否激活账户
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if ($user->activations->active == 0) {
            return redirect('/')->with('status', '您需要激活账户才能继续');
        }

        return $next($request);
    }
}
