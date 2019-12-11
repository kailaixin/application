<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\application\Good;

class GoodController extends Controller
{
    public function save(Request $request)
    {
        $data = $request->all();
        $res = Good::insertGetId($data);
        if ($res == true) {
            echo json_encode(['font'=>'添加成功','code'=>1]);
        }else{
            echo json_encode(['font'=>'请求超时','code'=>2]);
        }
    }
}
