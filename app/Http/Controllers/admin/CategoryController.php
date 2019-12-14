<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\model\cate;
//use App\Tools\Tools;
use DB;

class CategoryController extends Controller
{
    /**
     * 商品分类的添加
     */
    public function create()
    {

        $obj = new \Tools();
        var_dump($obj);
        $cateInfo = cate::get()->toArray();
//        dd($cateInfo);
        $cateInfo = $obj::tree($cateInfo);
//        dd($cateInfo);
        return view('admin/cate/create', ['cateInfo' => $cateInfo]);
    }

    /**
     * 商品添加处理
     */
    public function save(Request $request)
    {
        //接收
        $post = $request->all();
//        dd($post);
        $cate_name = $post['c_name'];
        $p_id = $post['p_id'];
        $is_show = $post['is_show'];
        $is_nav = $post['is_nav'];
//        验证
        $validator = Validator::make($post, [
            'c_name' => 'required|unique:cate|max:10',
        ], [
            'c_name.required' => '分类名称的不能为空',
            'c_name.unique' => '分类名称已存在',
            'c_name,max' => '分类名称字符不超过10个',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/cate/create')
//                ->back()
                ->withErrors($validator)
                ->withInput();
        }

//       入库
        $res = cate::create([
            'c_name' => $cate_name,
            'p_id' => $p_id,
            'is_show' => $is_show,
            'is_nav' => $is_nav,
            'create_time' => time(),
        ]);
        if ($res) {
            echo "<script>alert('添加成功');window.location.href = 'list';</script>";
            die;
        } else {
            echo "<script>alert('添加失败');window.location.href = 'create';</script>";
            die;
        }
    }

    /**
     * 商品分类列表
     */
    public function list(Request $request)
    {
        $query = $request->input();
//        dd($query);
        $where = [];
        $name = $request->input('c_name') ? $request->input('c_name') : '';
        if (isset($name)) {
            $where[] = ['c_name', 'like', "%{$name}%",];
        }
        $is_show = $request->input('is_show');
        if ($is_show === '1' || $is_show === '2') {
            $where[] = ['is_show', 'like', "%{$is_show}%",];
        } elseif ($is_show === '3') {
            $where[] = '';
        }
//       print_r($is_show);
        $pageSize = config('app.pageSize');
//        dd($pageSize);
        $cate = cate::where($where)->get();
//        dd($cate);
        $obj = new \Tools();
        $cateInfo = $obj::tree($cate);
        $cateInfo = json_decode(json_encode($cateInfo), 1);
//        dd($cateInfo);
        return view('admin/cate/list', compact('cate', 'query', 'cateInfo'));
    }

    /**
     * 商品分类的删除
     */
    public function delete(Request $request)
    {
        $id = $request->id;
//        dd($id);
        $first = cate::where('p_id', $id)->get()->toArray();
//        dd($first);
        if ($first) {
            echo "<script>alert('该分类下有子分类不能删除');window.location.href = 'list';</script>";
            die;
        } else {
            $delete = cate::where('c_id', $id)->delete();
            echo "<script>alert('删除成功');window.location.href = 'list';</script>";
            die;
        }

    }

    /**
     * 商品分类修改页面
     */
    public function edit(Request $request)
    {
        $id = $request->id;
//        dd($id);
        $cateInfo = cate::where('c_id', $id)->first()->toArray();
//        dd($cateInfo);
        $data = cate::get()->toArray();
//        dd($data);
        return view('admin/cate/edit', ['cateInfo' => $cateInfo, 'data' => $data]);
    }

    /**
     * 商品分类修改执行页面
     */

    public function update(Request $request)
    {
        //接收
        $id = $request->id;
//        dd($id);
        $post = $request->except('_token');
        $post['create_time'] = time();
//        dd($post);
        //验证
        if (empty($post['c_name'])) {
            echo "<script>alert('分类名称不能为空')</script>";
            die;
        }
//        $validator = Validator::make($post, [
//            'c_name' => 'required|unique:admin_cate|max:10',
//        ],[
//            'c_name.require' => '分类名称的不能为空',
//            'c_name.unique' => '分类名称已存在',
//            'c_name,max' => '分类名称字符不超过10个'
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/admin/cate/edit')
//                ->withErrors($validator)
//                ->withInput();
//        }
//        $errors = $validator->errors();
//        echo $errors ->first('c_name');
//        入库
        $res = cate::where('c_id', $id)->update($post);
//        dd($res);
        if ($res) {
            echo "<script>alert('修改成功');window.location.href = '/admin/cate/list';</script>";
            die;
        } else {
            echo "<script>alert('修改失败');window.location.href = '/admin/cate list';</script>";
            die;
        }

    }

    /**
     * 无限极分类
     * @param array $arr [要排序的数组]
     * @param integer $pid [父id]
     * @return array [排序好的数组]
     */
//    public function tree($arr,$pid=0,$lenvel=0)
//    {
////        dd(132);
//        static $res = array();
//        foreach($arr as $v){
//            if ($v['p_id'] == $pid){//找到顶级id
//                $v['lenvel'] = $lenvel;
//                $res[] = $v;
//                $this->tree($arr,$v['c_id'],$lenvel+1);
//            }
//        }
//        return $res;
//    }

}
