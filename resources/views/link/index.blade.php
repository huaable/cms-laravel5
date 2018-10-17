@extends('layouts.app')

<style>

    .rank-website {
        overflow: hidden;
    }

    .rank-website .rank-item {
        /*margin-bottom: 20px;*/
        /*border: 4px solid #ddd;*/
        padding: 15px;
        overflow: hidden;
        float: left;
        width: 25%;
        background-color: #fefefe;
        height: 120px;
        /*box-shadow: 0 0 1px #ddd;*/
    }

    .rank-website a {
        float: left;
        margin-right: 15px;
        display: block;
        color: #888

    }

    .rank-website img {
        display: block;
        margin: 0 auto;
        height: 50px;
    }

    .rank-website h3 {
        font-size: 14px;
        text-align: center;
        margin: 10px 0 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-overflow: -o-ellipsis-lastline;
        text-overflow: ellipsis;

    }

    .rank-website p {
        font-size: 12px;
        text-align: justify;
        margin: 0;
    }

</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-heading"><h1>友情链接</h1></div>
                <div class="block-body">

                    <ul class="rank-website">

                        @foreach($links as $link)

                        <li class="rank-item">
                            <!--<span class="item-label gold">{$index}</span>-->
                            <a href="{{url('/links',$link->id)}}" target="_blank">
                                <img src="" alt=""/>
                                <h3>{{$link->title}}</h3>
                            </a>
                            <p>{{$link->description}}</p>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection