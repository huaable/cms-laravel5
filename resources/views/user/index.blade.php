@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block">

        <div class="row">
            <div class="col-md-4">
                <div class="block-heading">
                    <h4>王者榜
                        <small>我觉得我充满了力量!</small>
                    </h4>
                </div>
                <div class="block-body">

                    <ul class="list-unstyled users-list">
                        @foreach($kingUsers as $index=>$user)
                        <li>
                            <div class="l-thumb">
                                <p>{{$index+1}}</p>
                                <a href="{{url('/u',$user->id)}}" title="{{$user->name}}">
                                    <img class="media-object" src="{{asset('/img/avatar.gif')}}" alt="{{$user->name}}"
                                    >
                                </a>
                            </div>
                            <div class="r-content">
                                <h5 class="r-title">
                                    <a href="{{url('/u',$user->id)}}" title="{{$user->name}}">{{$user->name}}</a>
                                    <span> {{$user->fans_count()}} 人关注</span>
                                </h5>
                                <div class="desc">{{$user->description}}</div>
                                <div>
                                    <small>王者指数:{{$user->king_weight}}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <hr/>
                    <div class="help-block">根据根据粉丝数量、被赞、成就任务进行排名</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block-heading">
                    <h4>活跃用户
                        <small>我来啦!</small>
                    </h4>
                </div>
                <div class="block-body">

                    <ul class="list-unstyled users-list">
                        @foreach($activityUsers as $index=>$user)
                        <li>
                            <div class="l-thumb">
                                <p>{{$index+1}}</p>
                                <a href="{{url('/u',$user->id)}}" title="{{$user->name}}">
                                    <img class="media-object" src="{{asset('/img/avatar.gif')}}" alt="..."
                                    >
                                </a>

                            </div>
                            <div class="r-content">
                                <h5 class="r-title">
                                    <a href="{{url('/u',$user->id)}}" title="{{$user->name}}">{{$user->name}}</a></h5>
                                <div class="desc">{{$user->description}}</div>
                                <div>
                                    <small>活跃指数:{{$user->activity_weight}}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <hr/>

                    <div class="help-block">记录最近7天登录、浏览、点赞、发文、评论等行为，提升活跃排名</div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="block-heading">

                    <h4>闪亮登场
                        <small>欢迎新人,我们迎来了第{{$users_count}}个用户!</small>
                    </h4>
                </div>
                <div class="block-body">

                    <ul class="list-unstyled users-list">
                        @foreach($users as $index=>$user)
                        <li>
                            <div class="l-thumb">
                                <p>{{$index+1}}</p>
                                <a href="{{url('/u',$user->id)}}" title="{{$user->name}}">
                                    <img class="media-object" src="{{asset('/img/avatar.gif')}}" alt="..."
                                    >
                                </a>
                            </div>
                            <div class="r-content">
                                <h5 class="r-title"><a href="{{url('/u',$user->id)}}" title="{{$user->name}}">{{$user->name}}</a>
                                </h5>
                                <div class="desc">{{$sayHello()}}</div>
                                <div>
                                    <small>{{$user->created_at}}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>


                    <hr/>
                    <div class="help-block">以上打招呼信息，随机生成</div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection