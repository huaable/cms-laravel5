@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            @foreach($posts as $post)
            <article class="post">
                <div class="post-head">
                    <h1 class="post-title"><a href="{{url('/post',$post->id)}}">{{$post->title}}</a>
                    </h1>
                    <div class="post-meta">
                        <span class="author">
                            作者：<a href="{{url('/u',$post->user_id)}}" target="_blank">{{$post->user->name}}</a>
                        </span>
                        •
                        <time class="post-date">{{date('Y-m-d',strtotime($post->created_at))}}</time>
                    </div>
                </div>

            </article>
            @endforeach
            @if($posts->total() ==0)

            <div class="alert alert-warning" role="alert">
                <a href="{{url('/post/create')}}" class="alert-link">快去发布...</a>
            </div>
            @endif
            <div>
                {{$posts->appends(['w'=>request('w')])->links()}}
            </div>
        </main>
        <aside class="sidebar col-md-3">
            @include('post._tools')
        </aside>
    </div>
</div>
@endsection