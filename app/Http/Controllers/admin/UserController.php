<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\UserModel as user;
class UserController extends Controller
{
    public function list()
    {
        $data=user::get();
        return view('admin.user.list',['data'=>$data]);
        
    }


     public function edit()
    {
        $data=user::find(1);
        // dd($data);
        return view('admin.user.edit',['data'=>$data]);
    }
}
