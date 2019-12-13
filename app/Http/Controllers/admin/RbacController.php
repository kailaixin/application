<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RbacController extends Controller
{
     
    public function r_create()
    {
        return view('admin/rbac/r_create');
    }
    public function gra_save()
	{
        
        $req = request()->all();
		$res = DB::table('role')->insert([
            'sole'=>$req['sole'],
            'centent'=>$req['centent'],
            'create_time' => time()
		]);
		if ($res) {
			return redirect('admin/rbac/r_list');
		}else{
			echo "未知错误";
		}
    }
    public function r_list(Request $request)
    {
		$data = DB::table('role')->get();
		// dd($data);
        return view('admin/rbac/r_list',['role'=>$data]);
    }
    public function gra_delete(Request $request,$id)
    {
		$res = DB::table('role')->where(['r_id'=>$id])->delete();
		// dd($res);
		if ($res) {
			return redirect('admin/rbac/r_list');
		} else {
			echo "删除失败";
		}
    }
    public function gra_edit($id)
    {
        $info=DB::table('role')->where('r_id',$id)->get();
        // dd($info);
		$info=$info[0];
        return view('admin/rbac/gra_edit',['info'=>$info]);
    }
    public function gra_update(Request $request)
    {
        $data=request()->post();
		// dd($data);
		$res=DB::table('role')->where('r_id',$data['r_id'])->update($data);
		if($res){
			echo "<script>alert('修改成功！');location.href='/admin/rbac/r_list'</script>";
		}
    }

}
