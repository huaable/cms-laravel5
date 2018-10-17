@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">

            <div class="block">
                <div class="block-heading">
                    <h1>话题广场
                        <small><a href="">申请话题</a></small>
                    </h1>
                </div>
                <div class="block-body">

                    <div class="row">

                        <div class="col-md-12">
                            <p>
                                @guest
                                <a href="{{url('/login')}}">登录后可以参与讨论</a>
                                @else
                                {{Auth::user()->name}}同学，请发言！
                                @endguest
                            </p>
                            <ul class="list list-group">
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>影视后期</h4>
                                    <p>最新发言：这个特效谁会做？</p>
                                </a>
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>1709</h4>
                                    <p>最新发言：同学们好？</p>
                                </a>
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>游戏后期</h4>
                                    <p>最新发言:很帅的技能</p>
                                </a>
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>广告后期</h4>
                                    <p>最新发言:三维的很酷！</p>
                                </a>
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>演员</h4>
                                    <p>最新发言:CG演员好幸福！</p>
                                </a>
                                <a class="list-group-item" href="{{url('/topic',1)}}">
                                    <h4>拍摄</h4>
                                    <p>最新发言:摄像机好重，工作了一天。</p>
                                </a>
                            </ul>
                            <hr/>
                            <p>以上信息来自话题组最新发言，我们尽量做到动态更新</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <div class="block">
                <div class="block-heading">
                    <h1 class="title">我的话题
                        <small>有趣、有料</small>
                    </h1>
                </div>
                <div class="block-body">

                    <ul class="block-list">
                        <li>
                            <a href="{{url('/topic',1)}}">厦门旅行</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">广告特效</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">AK大神</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">雷神3</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">广告需求组</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="block">
                <div class="block-heading">
                    <h1 class="title">热门话题
                        <small>Top10 赶紧围观</small>
                    </h1>
                </div>
                <div class="block-body">
                    <ul class="block-list">
                        <li>
                            <a href="{{url('/topic',1)}}">厦门旅行</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">广告特效</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">AK大神</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">雷神3</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">AE特效</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">剧本</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">灯光组</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">导演组</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">影视设备支援</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">广告需求</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="block">
                <div class="block-heading">
                    <h1 class="title">
                        新话题申请中
                        <small>需关注人数>=50</small>
                    </h1>
                </div>
                <div class="block-body">
                    <ul class="block-list">
                        <li>
                            <a href="{{url('/topic',1)}}">厦门旅行 （12/50）</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">广告特效 （12/50）</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">AK大神 （12/50）</a>
                        </li>
                        <li>
                            <a href="{{url('/topic',1)}}">雷神3 （12/50）</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection