@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="block" style="background-color: #fff;">
                <div class="block-body">
                    <h1>{{$user->name}}</h1>
                    <p>{{$user->description}}</p>
                </div>
            </div>
        </div>
        @if(auth::id() == $user->id)
        <main class="col-md-9">
            @else
            <main class="col-md-12">

            @endif
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
                <a href="javascript:;" class="alert-link">还没有发布任何文章</a>
            </div>
            @endif
            <div>
                {{$posts->appends(['w'=>request('w')])->links()}}
            </div>
        </main>
        <aside class="sidebar col-md-3">
            @if(auth::id() == $user->id)
            @include('post._tools')
            @endif
        </aside>
    </div>
    <hr/>
</div>

@endsection