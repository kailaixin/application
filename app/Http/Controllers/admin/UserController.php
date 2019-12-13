<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\UserModel as user;
class UserController extends Controller
{
    public function list()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $data=user::where('u_id',$u_id)->get();
        return view('admin.user.list',['data'=>$data]);
        
    }


     public function edit()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $data=user::find($u_id);
        // dd($data);
        return view('admin.user.edit',['data'=>$data]);
    }

    public function update()
    {
        $data = request()->all();
        dd($data);
    }
}
