<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\BrandModel as brand;
class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brand.create');
    }

    public function save()
    {
        $post=request()->all();
        $res=brand::create($post);
        if($res){
            return redirect('/admin/brand/list');
        }
    }

    public function list()
    {
        $data=brand::get();
        return view('admin.brand.list',['data'=>$data]);
    }
}
