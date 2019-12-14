@extends('vendor.layout')
@section('title','后台首页')
@section('content')
    <style>
        #form{
            background-color: #ff00ff;
        }
        #h1{
            color: #00ff7f;
            font-size: 70px;
            line-height: 344px;
        }
        #h2{
            color: #4169e1;
            font-size: 30px;
            line-height: 240px;
        }
    </style>
    <form id="form">
        <body>
        <h1 id="h1" align="center">Welcome to my electronic mall！</h1>
        <marquee><font color="red"><h2 id="h2">欢迎 欢迎 热烈欢迎 (*^_^*)</h2></marquee>
        </body>
    </form>
@endsection
