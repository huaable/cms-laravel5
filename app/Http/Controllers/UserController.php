<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'App\Http\Middleware\Activation']);
    }

    public function index()
    {
        $users = \App\User::orderBy('id', 'desc')->paginate(30);
        $users_count = \App\User::count();
        $activityUsers = \App\User::orderBy('activity_weight', 'desc')->paginate(30);
        $kingUsers = \App\User::orderBy('king_weight', 'desc')->paginate(30);

        $sayHello = function () {

            $map = [
                '我是来搞笑的！',
                '谁看到了我的皇冠？',
                '好想看电影...',
                '走你～',
                '一览众山小。',
                '我发誓，不再熬夜！',
                '我是传说！',
                '吃货...',
                '假装是新人...',
                '有点紧张，你们好！',
                'Hi~~~',
                '我是猴子请来的。',
                '愿世界和平！',
                '有点饿了，给我点吃的。',
                '今天天气不错',
                '交个朋友~',
                '我觉得我充满了力量！',
                '好困，好像睡一觉。',
                '我喜欢你～',
                '告诉你一个秘密，别告诉别人～',
                '好幸福',
                '突然想唱歌',
                '稀有～',
                '传说～',
            ];
            return $map[array_rand($map)];
        };

        return view('user/index')->with(compact('users', 'users_count', 'sayHello', 'activityUsers', 'kingUsers'));

    }

    public function home(\App\User $user)
    {

        $posts = \App\Post::where('user_id', '=', $user->id)->paginate(10);
        return view('user/home')->with(compact('user', 'posts'));
    }

    public function edit()
    {

        return view('user/edit');
    }

    public function update()
    {

        $this->validate(request(), [
            'name' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
        ]);

        \Auth::user()->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        $status = '更新成功';
        return back()->with(compact('user', 'status'));
    }
}
