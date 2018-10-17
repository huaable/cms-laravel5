@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <main class="col-md-9">
            <div class="block block-default">
                <div class="block-heading"><h1>发布文章</h1></div>

                <div class="block-body">
                    <form class="form" method="POST" action="{{ route('post.store') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class=" control-label">标题</label>

                            <input id="title" type="text" class="form-control" name="title"
                                   value="{{ old('title') }}" required autofocus placeholder="">

                            @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
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
            @include('post._tools')
        </aside>
    </div>
</div>
@include('layouts.wangEditor')
@endsection
