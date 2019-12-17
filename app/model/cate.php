<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class cate extends Model
{
    //关联数据表
    protected $table = 'cate';
    //定义主键id
//    protected $connection = "1903";
    protected $primaryKey='c_id';
    //关闭自动时间戳
    public $timestamps = false;

    protected $fillable = ['c_name', 'is_show','is_nav','p_id','create_time'];
}
