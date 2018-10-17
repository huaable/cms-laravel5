@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            @foreach($comments as $comment)
            <article class="post">
                <div class="post-head">

                    <h1 class="post-title"><a href="{{url('/post',$comment->post->id)}}">{{$comment->post->title}}</a></h1>

                    <div class="media">
                        <div class="media-heading"><a href="{{url('u',$comment->user_id)}}">{{$comment->user->name}}</a> | <small>{{date('Y-m-d',strtotime($comment->created_at))}}</small></div>
                        <div class="media-body">我评论：{{$comment->content}}</div>
                    </div>

                </div>
            </article>
            @endforeach
            @if($comments->total() == 0)
            <div class="alert alert-warning" role="alert">
                <a href="{{url('/post')}}" class="alert-link">快去评论...</a>
            </div>
            @endif
            <div>
                {{$comments->appends(['w'=>request('w')])->links()}}
            </div>
        </main>
        <aside class="sidebar col-md-3">
            @include('post._tools')
        </aside>
    </div>
</div>
@endsection