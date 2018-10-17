@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            <div class="block block-default">
                <div class="block-heading"><h1>反馈内容</h1></div>

                <div class="block-body">
                    <form class="form" method="POST" action="{{ route('feedback.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class=" control-label">标题</label>

                            <input id="title" type="text" class="form-control" name="title"
                                   value="{{ old('title') }}" required autofocus placeholder="为了我更好的查看反馈记录，请简单几个字起个标题，谢谢！">
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label for="contact" class=" control-label">联系方式</label>

                            <input id="contact" type="text" class="form-control" name="contact"
                                   value="{{ old('contact') }}"  autofocus placeholder="可以填、可以不填">
                            @if ($errors->has('contact'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class=" control-label">正文</label>
                            <div id="editor" data-for="#content"></div>
                            <textarea hidden name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                保存发布
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <aside class=" col-md-3">
        </aside>
    </div>
</div>
@include('layouts.wangEditor')
@endsection
