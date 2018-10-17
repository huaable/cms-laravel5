@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            <div class="block">

                <article class="post">
                    <div class="post-head">
                        <h1 class="post-title"><a href="{{url('/post',$post->id)}}">{{$post->title}}</a>
                        </h1>
                        <div class="post-meta"><span class="author">作者：<a href="{{url('/u',$post->user_id)}}"
                                                                          target="_blank">{{$post->user->name}}</a></span>
                            •
                            <time class="post-date">{{date('Y-m-d',strtotime($post->created_at))}}</time>
                        </div>
                        <div class="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </article>
                <div class="comment">

                    <div class="block-body">
                        @include('layouts.error')

                        <form action="{{url('/post/comment',$post->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea class="form-control" name="content" style="resize: none" required>{{old('content')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-default">评论</button>
                            </div>
                        </form>
                    </div>

                    <div class="block-body">
                        @foreach($comments as $comment)
                        <div class="media">
                            <div class="media-heading"><a href="{{url('u',$comment->user_id)}}">{{$comment->user->name}}</a> | <small>{{date('Y-m-d',strtotime($comment->created_at))}}</small></div>
                            <div class="media-body">{{$comment->content}}</div>
                        </div>
                        @endforeach
                        {{$comments->links()}}
                    </div>

                </div>
            </div>

        </main>
        <aside class="sidebar col-md-3">
            @include('post._tools')
        </aside>
    </div>
</div>
@endsection