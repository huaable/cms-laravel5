@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

            <h5>修改资料</h5>
            <hr/>
            <form class="form" action="{{url('u/edit')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">显示昵称</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}"/>
                </div>
                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea id="description" name="description" class="form-control" style="resize:none" >{{Auth::user()->description}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">保存修改</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection