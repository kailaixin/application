<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\model\UserModel as user;
class UserController extends Controller
{
    /**
     * 用户信息列表视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $data=user::where('u_id',$u_id)->get();
        return view('admin.user.list',['data'=>$data]);

    }

    /**
     * 用户信息修改视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $data=User::where('u_id',$u_id)->get()->toArray();
        return view('admin.user.edit',['data'=>$data]);
    }

    /**
     * 用户信息修改处理
     */
    public function update()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $data = request()->all();
        if (isset(array_keys($data)[5])) {
            echo json_encode(['font'=>'非法提交被阻止','code'=>2]);die;
        }
        if ($data['nick'] == '') {
            echo json_encode(['font'=>'昵称不能为空','code'=>2]);die;
        }
        if (strlen($data['nick']) >25) {
            echo json_encode(['font'=>'昵称过长','code'=>2]);die;
        }
        if ($data['email'] == '') {
            echo json_encode(['font'=>'邮箱不能为空','code'=>2]);die;
        }
        $email = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
        if(!preg_match($email,$data['email'])){
            echo json_encode(['font'=>'邮箱格式有误','code'=>2]);die;
        }
        if (strlen($data['email']) >25) {
            echo json_encode(['font'=>'邮箱过长','code'=>2]);die;
        }
        if ($data['tel'] == '') {
            echo json_encode(['font'=>'手机号不能为空','code'=>2]);die;
        }
        $tel = '/^0?1[3|4|5|6|7|8][0-9]\d{8}$/';
        if (!preg_match($tel,$data['tel'])) {
            echo json_encode(['font'=>'手机号码格式有误','code'=>2]);die;
        }
        if ($data['age'] == '') {
            echo json_encode(['font'=>'年龄不能为空','code'=>2]);die;
        }
        if ($data['age'] > 120) {
            echo json_encode(['font'=>'您大于120岁？','code'=>2]);die;
        }
        if ($data['sex'] == '') {
            echo json_encode(['font'=>'性别不能为空','code'=>2]);die;
        }
        $res = User::where('u_id',$u_id)->update($data);
        if ($res == true) {
            echo json_encode(['font'=>'修改成功','code'=>1]);
        }else{
            echo json_encode(['font'=>'请求超时','code'=>2]);
        }
    }

    public function headimg()
    {
        $session = request()->session()->get('userinfo');
        $u_id = $session['u_id'];
        $headimg['headimg'] = User::where('u_id',$u_id)->first()->headimg;
        return view('admin.user.headimg',['headimg'=>$headimg]);
    }

    public function headimg_do(Request $request)
    {
//        $file = $_FILES['headimg'];
        $dir = '/upload/headimg/';
        if (!is_dir($dir)){
            mkdir($dir,0,777);
        }
        //获取字段名
        $fileCharater = $request->file('headimg');
        //获取文件的扩展名
        $ext = $fileCharater->getClientOriginalExtension();
        //获取文件的绝对路径
        $path = $fileCharater->getRealPath();
        //定义文件名
        $filename = uniqid().time().".".$ext;
        //存入数据库的路径
        $headimg = "/upload/headimg/".$filename;
        //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
        $bool = Storage::disk('headimg')->put($filename, file_get_contents($path));
        $session = request()->session()->get('userinfo');
        $res = User::where('u_id',$session['u_id'])->update(['headimg'=>$headimg]);
        if (($bool == true) && ($res == true)) {
            echo "<script>alert('修改成功，下次登陆生效');location.href='/admin/headimg';</script>";
        }else{
            echo "<script>alert('请求超时');location.href='/admin/headimg';</script>";
        }
    }
}
