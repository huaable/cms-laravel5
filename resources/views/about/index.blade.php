@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{asset('/img/banner.jpeg')}}"  width="100%" alt=""/>
    <div class="block">
        <div class="block-heading">
            <h1>关于</h1>
        </div>
        <div class="block-body">
            <p>
                目标：更便捷的获取影视创作知识与其他相关资源；更轻松的欣赏、讨论、分析影视作品；更深入研究、交流讨论技术实现。为改善影视相关从业者、创作者的生态环境而努力。
            </p>

            <hr/>
            <p>
                联系人:肖华
            </p>
            <p>
                联系方式: <a title="coolr@foxmail.com" href="mailto:coolr@foxmail.com">coolr@foxmail.com</a>
            </p>
    </div>
</div>
@endsection