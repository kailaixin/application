<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\User;

class LoginController extends Controller
{
    /**
     * 登陆视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login.login');
    }

    /**
     * 登陆处理
     * @param Request $request
     */
    public function login_do(Request $request)
    {
        $arr = $request->all();
        $arr['pwd'] = md5($arr['pwd']);
        $result = User::where(['email'=>$arr['email'],'pwd'=>$arr['pwd']])->get()->toArray();
        if (empty($result)) {
            echo json_encode(['font'=>'用户名或密码有误','code'=>2]);die;
        }
        $data = [
            'u_id' => $result[0]['u_id'],
            'nick' => $result[0]['nick'],
            'email' => $result[0]['email'],
            'headimg' => $result[0]['headimg']
        ];
        $time['last_time'] = time();
        User::where('u_id',$data['u_id'])->update($time);
        $request->session()->put('userinfo',$data);
        $res = $request->session()->get('userinfo');
        if ($res) {
            echo json_encode(['font'=>'登陆成功','code'=>1]);
        }else{
            echo json_encode(['font'=>'请求超时，稍后再试','code'=>2]);
        }
    }

    /**
     * 注册试图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('admin.login.register');
    }

    /**
     * 注册处理
     * @param Request $request
     */
    public function register_do(Request $request)
    {
        $arr = $request->all();
        $arr['pwd'] = md5($arr['pwd']);
        $result = User::where('email',$arr['email'])->get()->toArray();
        $arr['sex'] = 1;
        $arr['create_time'] = time();
        if (!empty($result)) {
            echo json_encode(['font'=>'邮箱已存在','code'=>2]);die;
        }
        $res = User::insertGetId($arr);
        if ($res == true) {
            echo json_encode(['font'=>'注册成功','code'=>1]);
        }else{
            echo json_encode(['font'=>'请求超时，稍后再试','code'=>2]);
        }
    }

    public function out()
    {
        request()->session()->pull('userinfo');
        echo json_encode(['font'=>'退出成功','code'=>1]);
    }
}
