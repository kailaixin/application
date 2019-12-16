@extends('vendor.layout')
@section('title','商品列表展示')
@section('content')
    <form class="form-inline" action="{{url('admin/cate/list')}}" method="get">
        <div class="form-group">
            <label for="exampleInputName2">分类名称</label>
            <input type="text" name="c_name" class="form-control" id="exampleInputName2" placeholder="搜索的分类名称">
        </div>
        <label for="exampleInputName2">是否显示</label>
        <select class="form-control" name="is_show">
            <option value="1">是</option>
            <option value="2">否</option>
            <option value="">全部</option>

        </select>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <table class="table table-hover">
       <tr id="quan">
           <th>编号</th>
           <th>分类名称</th>
           <th>是否显示</th>
           <th>是否在导航栏上显示</th>
           <th>添加时间</th>
           <th>操作</th>
       </tr>
    @foreach($cateInfo as $v)
        <tr pid="{{$v['p_id']}}" cate_id="{{$v['c_id']}}" >
            <td>{{$v['c_id']}}</td>
            <td>

                <span cat_id="{{$v['c_id']}}">
                    <span id="kai">♥</span>
                    <span id="show">{{str_repeat('⭐',$v['lenvel']*2)}}{{$v['c_name']}} </span>
                    <input type="text" id="hide" style="display: none" value="{{str_repeat('⭐',$v['lenvel']*2)}}{{$v['c_name']}}">
                </span>
            </td>
            <td>
               <span id="aa"> @if($v['is_show'] == 1) 是 @else 否 @endif </span>
            </td>
            <td> @if($v['is_nav'] == 1) 是 @else 否 @endif  </td>
            <td>{{date("Y-m-d H:i:s",$v['create_time'])}}</td>
            <td>
                <a class="btn btn-success" href="{{url('admin/cate/edit').'?id='.$v['c_id']}}">编辑</a>||
                <a class="btn btn-warning" href="{{url('admin/cate/delete').'?id='.$v['c_id']}}">删除</a>
            </td>
        </tr>
        @endforeach
{{--        <tr>--}}
{{--            <td colspan="6" align="center"> {{ $cate->appends($query)->links() }}</td>--}}
{{--        </tr>--}}
    </table>
    <script src="{{asset('/static/jquery.js')}}"></script>
    <script>
        $(function(){
          $("tr[pid != 0]").hide();
          $("#quan").show();
        });
      $(document).on('click','#kai',function () {
        var _this = $(this);
          var cat_id = _this.parent().attr('cat_id');
          var kai = _this.text();

        // console.log(kai);return false;
        if (kai == '♥'){
            $("tr[pid="+cat_id+"]").show();
            _this.text('♥♥');
          }else{
            $("tr[pid="+cat_id+"]").hide();
            _this.text('♥');
        }

      })
        //即点即改 改变状态
         $(document).on('click','#aa',function () {
             // alert(123);
             var _this = $(this);
             var cate_id = $(this).parents('tr').attr('cate_id');//获取cate_id
             var is_show = _this.text();
             // alert(cate_id);
             // alert(is_show);
             var value;
             if (is_show == '是'){
                 _this.text('否');
                 value = 2;
             }else {
                 _this.text('是');
                 value = 1;
             }
             // alert(value);
             // $.post("change",{cate_id:cate_id,value:value},function (res) {
             //     alert(123);
             // })
             $.ajax({
                 url:'change',
                 data:{cate_id:cate_id,value:value},
                 type:'post',
                 dataType:'json',
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 success:function (res) {

                 }
             })
         })

    </script>


@endsection
