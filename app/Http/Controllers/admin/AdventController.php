<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdventController extends Controller
{
    public function create()
    {
        return view('admin/advent/create');
    }
    public function save(Request $request)
    {
		$session = $request->session()->get('userinfo');
        $req=$request->all();
		$req['create_time']=time();
		$req['u_id'] = $session['u_id'];
		// dd($req);
		if (request()->hasFile('f_img')) {
			$req['f_img'] = $this->upload('f_img');
		}
		$res = DB::table('focus')->insertGetId($req);
		if ($res) {
			return redirect('admin/advent/list');
		}else{
			echo "未知错误";
		}
    }
    public function upload($name)
	{
		if (request()->file($name)->isValid()) {
			$f_img = request()->file($name);
			// $extension = $pic->extension();
			// $req = $pic->syore('pic');
			$req = $f_img->store('','public');
			return $req;
		}
		exit('未上传文件');
	}
	public function list(Request $request)
	{
		$data = DB::table('focus')->get();
		// dd($data);
        return view('admin/advent/list',['focus'=>$data]);
		
	}
	public function edit($id)
	{
		$info=DB::table('focus')->where('f_id',$id)->get();
        // dd($info);
		$info=$info[0];
        return view('admin/advent/edit',['info'=>$info]);
	}
	public function update(Request $request)
    {
		$session = $request->session()->get('userinfo');
		$data=request()->all();

		$data['update_time']=time();
		$data['u_id'] = $session['u_id'];
		if ($request->hasFile('f_img')) {
			$data['f_img'] = $this->upload('f_img');
		}
		$res=DB::table('focus')->where('f_id',$data['f_id'])->update($data);
		if($res){
			echo "<script>alert('修改成功！');location.href='/admin/advent/list'</script>";
		}
	}
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
