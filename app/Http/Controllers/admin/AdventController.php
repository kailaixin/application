<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\admin\User;
use App\admin\Focus;
use DB;

class AdventController extends Controller
{
    /** 广告列表视图 */
    public function list(Request $request)
    {
        $data = Focus::get()->toArray();
        $user = User::get()->toArray();
        foreach ($data as $k => $v) {
            foreach ($user as $value) {
                if ($v['u_id'] == $value['u_id']) {
                    $data[$k]['nick'] = $value['nick'];
                }
            }
        }
        return view('admin/advent/list',['focus'=>$data]);
    }

    /** 广告添加视图 */
    public function create()
    {
        return view('admin/advent/create');
    }

    /** 广告添加处理 */
    public function save(Request $request)
    {
		$session = $request->session()->get('userinfo');
        $req=$request->all();
        if ($req['f_url'] == '') {
            echo"<script>alert('网址不能为空');history.back();</script>";die;
        }
        $url = "/^http(s)?:\\/\\/.+/";
        if (!preg_match($url,$req['f_url'])) {
            echo"<script>alert('网址要以http:// 或 https:// 开始');history.back();</script>";die;
        }
        if (strlen($req['f_url']) > 30) {
            echo"<script>alert('网址过长');history.back();</script>";die;
        }
        if ($req['f_img'] == '') {
            echo"<script>alert('图片不能为空');history.back();</script>";die;
        }
        if ($req['f_desc'] == '') {
            echo"<script>alert('描述不能为空');history.back();</script>";die;
        }
		$req['create_time']=time();
		$req['u_id'] = $session['u_id'];

        $dir = '/upload/advent/';
        if (!is_dir($dir)){
            mkdir($dir,0,777);
        }
        //获取字段名
        $fileCharater = $request->file('f_img');
        //获取文件的扩展名
        $ext = $fileCharater->getClientOriginalExtension();
        //获取文件的绝对路径
        $path = $fileCharater->getRealPath();
        //定义文件名
        $filename = uniqid().time().".".$ext;
        //存入数据库的路径
        $f_img = "/upload/advent/".$filename;
        //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
        Storage::disk('advent')->put($filename, file_get_contents($path));
		$req['f_img'] = $f_img;
		$res = DB::table('focus')->insertGetId($req);
		if ($res) {
			return redirect('admin/advent/list');
		}else{
			echo "未知错误";
		}
    }

	/** 广告修改视图 */
	public function edit($id)
	{
		$info=DB::table('focus')->where('f_id',$id)->get();
		$info=$info[0];
        return view('admin/advent/edit',['info'=>$info]);
	}

	/** 广告修改处理 */
	public function update(Request $request)
    {
		$session = $request->session()->get('userinfo');
        $data['u_id'] = $session['u_id'];
		$data=request()->all();
        if ($data['f_url'] == '') {
            echo"<script>alert('网址不能为空');history.back();</script>";die;
        }
        $url = "/^http(s)?:\\/\\/.+/";
        if (!preg_match($url,$data['f_url'])) {
            echo"<script>alert('网址要以http:// 或 https:// 开始');history.back();</script>";die;
        }
        if (strlen($data['f_url']) > 30) {
            echo"<script>alert('网址过长');history.back();</script>";die;
        }
        if ($data['f_desc'] == '') {
            echo"<script>alert('描述不能为空');history.back();</script>";die;
        }
        if (isset($data['f_img'])) {
            $dir = '/upload/advent/';
            if (!is_dir($dir)){
                mkdir($dir,0,777);
            }
            //获取字段名
            $fileCharater = $request->file('f_img');
            //获取文件的扩展名
            $ext = $fileCharater->getClientOriginalExtension();
            //获取文件的绝对路径
            $path = $fileCharater->getRealPath();
            //定义文件名
            $filename = uniqid().time().".".$ext;
            //存入数据库的路径
            $f_img = "/upload/advent/".$filename;
            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            Storage::disk('advent')->put($filename, file_get_contents($path));
            $data['f_img'] = $f_img;
        }
		$data['update_time']=time();
		$res=DB::table('focus')->where('f_id',$data['f_id'])->update($data);
		if($res == true){
			echo "<script>alert('修改成功！');location.href='/admin/advent/list'</script>";
		}else{
            echo "<script>alert('请求超时');history.back();</script>";
        }
	}

	/** 广告删除 */
	public function delete(Request $request,$id)
    {
		$res = DB::table('focus')->where(['f_id'=>$id])->delete();
		// dd($res);
		if ($res) {
			return redirect('admin/advent/list');
		} else {
			echo "删除失败";
		}
    }
}
