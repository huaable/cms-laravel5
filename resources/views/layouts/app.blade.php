<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?2') }}" rel="stylesheet">
</head>
<body>

<!-- Scripts -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="{{asset('lib/bootstrap3/js/bootstrap.min.js')}}"></script>
<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">有料</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!--                    <li><a href="{{url('/')}}">首页<span class="sr-only">(current)</span></a></li>-->
                    <!--                    <li><a href="{{url('/u')}}">用户</a></li>-->
                    <!--                    <li><a href="{{url('/topic')}}">广场</a></li>-->
                    <li><a href="{{url('/post')}}">文章</a></li>
                    <!--                    <li><a href="{{url('/note')}}">笔记</a></li>-->
                    <!--                    <li><a href="{{url('/source')}}">资源</a></li>-->
                    <!--                    <li><a href="{{url('/link')}}">友链</a></li>-->
                    <li><a href="{{url('/about')}}">关于</a></li>
                </ul>
                <form action="{{url('/post/search')}}" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input name="w" value="{{request('w')}}" type="text" class="form-control" placeholder="文章标题">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            @if (is_null(Auth::user()->activations) || Auth::user()->activations->active == 0)
                            <li>
                                <a class="dropdown-item" href="{{url('/sendActivationMail')}}">发送激活邮件</a>
                            </li>
                            @endif
                            <li><a href="{{url('/u',Auth::id())}}">我的主页</a></li>
                            <li><a href="{{url('/u/edit')}}">修改资料</a></li>
                            <li><a href="{{url('/feedback/create')}}">建议反馈</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    退出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{url('login')}}">登录</a></li>
                    <li><a href="{{url('register')}}">注册</a></li>
                    @endif
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div style="height: 65px"></div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @if (session('status'))

                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>

    </div>

    @yield('content')
</div>
<footer class="footer">
    <div class="container text-center">
        <ul class="links">
            <li><a class="h5" href="{{url('/')}}">首页</a></li>
            <li><a class="h5" href="{{url('/feedback/create')}}">意见反馈</a></li>
            <li><a class="h5" href="{{url('/about')}}">关于</a></li>
            <li><a class="h5" href="http://www.miitbeian.gov.cn/">闽ICP备18003677号</a></li>
        </ul>
        <p>Copyright © Hua.Xiao</p>

    </div>
</footer>
</body>
</html>
