@extends('vendor.layout')
@section('title','商品详情')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="120">
            <col width="300">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
        </colgroup>
        <thead>
        <tr align="center">
            <td>商品&nbsp;I&nbsp;D</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品库存</td>
            <td>所属品牌</td>
            <td>所属分类</td>
            <td>添加时间</td>
            <td>商品大图</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>{{$v['g_id']}}</td>
                <td>{{$v['g_name']}}</td>
                <td>{{$v['g_price']}}</td>
                <td>{{$v['g_stock']}}</td>
                <td>{{$v['b_name']}}</td>
                <td>{{$v['c_name']}}</td>
                <td>{{date('Y-m-d H:i:s',$v['create_time'])}}</td>
                <td><img src="{{$v['g_img']}}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table class="layui-table">
        <colgroup>
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
        </colgroup>
        <thead>
        <tr align="center">
            <td>是否新品</td>
            <td>是否精品</td>
            <td>是否热销</td>
            <td>是否上架</td>
            <td>轮播图一</td>
            <td>轮播图二</td>
            <td>轮播图三</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>@if($v['is_new']==1)是 @else否 @endif</td>
                <td>@if($v['is_best']==1)是 @else否 @endif</td>
                <td>@if($v['is_hot']==1)是 @else否 @endif</td>
                <td>@if($v['is_up']==1)是 @else否 @endif</td>
                <td><img src="{{$v['g_imgs'][1]}}"></td>
                <td><img src="{{$v['g_imgs'][2]}}"></td>
                <td><img src="{{$v['g_imgs'][3]}}"></td>
            </tr>
        @endforeach
        </tbody>
    </table><table class="layui-table">
        <colgroup>
            <col width="">
        </colgroup>
        <thead>
        <tr align="center">
            <td>商品描述</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>{{$v['g_desc']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
