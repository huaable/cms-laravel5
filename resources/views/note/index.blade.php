@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <main class="col-md-8">
                <div class="block">
                    <div class="block-heading"><h1>2018-12-33</h1></div>
                    <div class="block-body">
                        明天要去xxx
                    </div>
                </div>
            </main>
            <aside class="sidebar col-md-4">
                <div class="widget">
                    <h4 class="title">工具箱</h4>
                    <a href="{{url('/posts/create')}}">发布文章</a>
                    <a href="{{url('/feedback','posts')}}">反馈建议</a>
                </div>
                <div class="widget">
                    <h4 class="title">文档</h4>
                    <a href="{{url('/column',1)}}" class="btn btn-default btn-block" target="_blank">2018 AE系列</a>
                    <a href="{{url('/column',1)}}" class="btn btn-default btn-block" target="_blank">2018 C4D系列</a>
                    <a href="{{url('/column',1)}}" class="btn btn-default btn-block" target="_blank">分镜解析系列</a>
                    <a href="{{url('/column',1)}}" class="btn btn-default btn-block" target="_blank">火星时代影视剪辑包装课堂笔记</a>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection