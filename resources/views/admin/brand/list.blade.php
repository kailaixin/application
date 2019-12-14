@extends('vendor.layout')
@section('title','品牌列表')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="100">
            <col width="250">
            <col width="300">
            <col width="200">
            <col width="250">
            <col>
        </colgroup>
        <thead>
        <tr align="center">
            <td>品牌 ID</td>
            <td>品牌名称</td>
            <td>品牌网址</td>
            <td>是否展示</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>{{$v['b_id']}}</td>
                <td>{{$v['b_name']}}</td>
                <td><a href="{{$v['b_url']}}">{{$v['b_url']}}</a></td>
                <td>@if($v['is_show']==1) 是 😋 @else 否 😡 @endif</td>
                <td>
                    <a class="layui-btn layui-btn-normal" href="">修改</a>
                    <a class="layui-btn layui-btn-danger" href="">删除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
