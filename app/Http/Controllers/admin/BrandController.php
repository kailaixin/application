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
        $req=request()->all();
        dd($req);
    }

    public function list()
    {

        return view('admin.brand.list');
    }
}
