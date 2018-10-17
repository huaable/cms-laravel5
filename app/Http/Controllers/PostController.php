<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','App\Http\Middleware\Activation'])->except(['index', 'show', 'search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('post/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'content' => 'required|max:65535',
        ]);

        \App\Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => \Auth::id()
        ]);

        return redirect('/post')->with('status','发布成功');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $comments = Comment::where('post_id', '=', $post->id)->orderBy('id', 'desc')->paginate(10);

        return view('post/show')->with(compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post                $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'content' => 'required|max:65535',
        ]);

        \App\Post::updateOrCreate([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return redirect("/posts/{$post->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function search()
    {
        $word = request('w', '');
        $posts = \App\Post::where('title', 'like', $word . '%')->paginate(10);
        return view('/post/index')->with(compact('posts'));
    }

    public function me()
    {
        $posts = \App\Post::where('user_id', '=', \Auth::id())->paginate(10);
        return view('/post/index')->with(compact('posts'));
    }

    public function zan()
    {
        $zan_posts = \App\Zan::where('user_id', '=', \Auth::id())->paginate(10);
        return view('/post/zan')->with(compact('zan_posts'));
    }

    public function comment(\App\Post $post)
    {
        $this->validate(request(), [
            'content' => 'required|min:2|max:255'
        ]);

        \App\Comment::create([
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
            'content' => request('content')
        ]);

        return back();
    }
    public function haveComment()
    {
        $comments = Comment::where('user_id', '=', \Auth::id())->paginate(10);
        return view('/post/have_comment')->with(compact('comments'));

    }

}
