@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            @foreach($zan_posts as $zan)
            <article class="post">
                <div class="post-head">
                    <h1 class="post-title"><a href="{{url('/post',$zan->post->id)}}">{{$zan->post->title}}</a>
                    </h1>
                    <div class="post-meta"><span class="author">作者：<a href="{{url('/u',$zan->post->user_id)}}"
                                                                      target="_blank">{{$zan->post->user->name}}</a></span>
                        •
                        <time class="post-date">{{date('Y-m-d',strtotime($zan->post->created_at))}}</time>
                    </div>
                </div>
            </article>
            @endforeach
            @if($zan_posts->total() ==0)

            <div class="alert alert-warning" role="alert">
                <a href="{{url('/post')}}" class="alert-link">快去点赞...</a>
            </div>
            @endif
            <div>
                {{$zan_posts->appends(['w'=>request('w')])->links()}}
            </div>
        </main>
        <aside class="sidebar col-md-3">
            @include('post._tools')
        </aside>
    </div>
</div>
@endsection