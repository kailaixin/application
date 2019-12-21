<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\cate;
class ApiController extends Controller
{
    /**
     * 顶级级分类分类
     * 查询商品分类信息接口
     */
    public function cate()
    {
        $cateone = cate::where('p_id','=',0)->get()->toArray();
        return json_encode(['msg'=>'查询成功','code'=>200,'cateone'=>$cateone],JSON_UNESCAPED_UNICODE);
    }

    /**
     * 热销种类
     */
    public function cate_hot()
    {
        $cate_hot = cate::where('is_hot','=',1)->get()->toArray();
//        dd($cate_hot);
        return json_encode(['msg'=>'查询成功','code'=>200,'cate_hot'=>$cate_hot],JSON_UNESCAPED_UNICODE);
    }
}
