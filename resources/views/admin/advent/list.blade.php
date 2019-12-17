@extends('vendor.layout')
@section('title','广告列表')
@section('content')
<table class="layui-table">
        <colgroup>
            <col width="60">
            <col width="80">
            <col width="150">
            <col width="100">
            <col width="">
            <col width="120">
            <col width="120">
            <col width="120">
            <col width="80">
            <col width="200">
        </colgroup>
        <thead>
        <tr align="center">
            <td>ID</td>
            <td>位置</td>
            <td>链接地址</td>
            <td>图片</td>
            <td>简述</td>
            <td>操作人</td>
            <td>添加时间</td>
            <td>修改时间</td>
            <td>状 态</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
            @foreach($focus as $k => $v)
                <tr align="center">
                    <td>{{$v['f_id']}}</td>
                    <td>@if($v['place']==1)首页@else详情@endif</td>
                    <td><a href="{{$v['f_url']}}">{{$v['f_url']}}</a></td>
                    <td><img src="{{$v['f_img']}}"></td>
                    <td>{{$v['f_desc']}}</td>
                    <td>{{$v['nick']}}</td>
                    <td>{{date('Y-m-d H:i:s',$v['create_time'])}}</td>
                    <td>@if($v['update_time']=='') 未修改 @else {{date('Y-m-d H:i:s',$v['update_time'])}} @endif</td>
                    <td>@if($v['status']==1)启用@else禁用@endif</td>
                    <td>
                        <a class="layui-btn layui-btn-normal" href="/admin/advent/edit/{{$v['f_id']}}">修改</a>
                        <a class="layui-btn layui-btn-danger delete" href="/admin/advent/delete/{{$v['f_id']}}">删除</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
