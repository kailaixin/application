@extends('vendor.layout')
@section('title','分类添加')
@section('content')
    <form action="{{url('admin/cate/save')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">商品分类名称</label>
            <input type="text" name="c_name" class="form-control" id="exampleInputEmail1" placeholder="分类名称">
            <span id="xing">*</span>
            @php echo $errors ->first('c_name') @endphp
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">选择分类</label>
            <select class="form-control" name="p_id">
                <option value="0">顶级分类</option>
                @foreach($cateInfo as $v)
                     <option value="{{$v['c_id']}}">{{str_repeat('---',$v['lenvel'])}}<a href="">{{$v['c_name']}}</a></option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">是否显示</label>
            <input type="radio" name="is_show" id="optionsRadios1" value="1" checked>是
            <input type="radio" name="is_show" id="optionsRadios1" value="2" checked>否
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">是否导航栏显示</label>
            <input type="radio" name="is_nav" id="optionsRadios1" value="1" checked>是
            <input type="radio" name="is_nav" id="optionsRadios1" value="2" checked>否
        </div>

        <button type="button" class="btn btn-default">提交</button>
    </form>
    <script>
     $(function () {
         // alert(13);
         $('.btn-default').on('click',function () {
             event.preventDefault();
            var c_name = $('[name="c_name"]').val();
            // alert(c_name);
            //  var msg = /([u4e00-u9fa5\dA-Za-z]){2,10}/;
             if (c_name==''){
                 $('#xing').html('分类名称不能为空').css('color','red');
                 return false;
             }
             // if (!msg.test(c_name)){
             //     $('#xing').html('分类名称必须以中文数字和下划线组成的2到7位字符').css('color','red');
             //     return false;
             // }
         })
     })
    </script>
@endsection
