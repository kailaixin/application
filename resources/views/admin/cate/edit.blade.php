@extends('vendor.layout')
@section('title','商品分类修改')
@section('content')
    <form action="{{url('admin/cate/update'.'/'.$cateInfo['c_id'])}}" method="post">
        @csrf
{{--        <input type="hidden" name="c_id" value="{{$cateInfo['c_id']}}">--}}
        <div class="form-group">
            <label for="exampleInputEmail1">商品分类名称</label>
            <input type="text" name="c_name" value="{{$cateInfo['c_name']}}" class="form-control" id="exampleInputEmail1" placeholder="分类名称">
            @php echo $errors->first('cate_name'); @endphp
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">选择分类</label>
            <select class="form-control" name="p_id">
                <option value="0">顶级分类</option>
                @foreach($data as $v)
                    <option value="{{$v['c_id']}}" @if($cateInfo['p_id'] == $v['c_id']) selected @endif> {{str_repeat('---',$v['lenvel'])}}{{$v['c_name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">是否显示</label>
            <input type="radio" name="is_show" id="optionsRadios1" value="1" @if($cateInfo['is_show'] == 1) checked @endif>是
            <input type="radio" name="is_show" id="optionsRadios1" value="0" @if($cateInfo['is_show'] == 2) checked @endif>否
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">是否导航栏显示</label>
            <input type="radio" name="is_nav" id="optionsRadios1" value="1" @if($cateInfo['is_nav'] == 1) checked @endif>是
            <input type="radio" name="is_nav" id="optionsRadios1" value="0" @if($cateInfo['is_nav'] == 2) checked @endif>否
        </div>

        <button type="submit" class="btn btn-default">修改</button>
    </form>
@endsection
