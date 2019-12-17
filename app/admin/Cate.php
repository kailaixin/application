<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $pk = 'c_id';
    protected $table ='cate';
    public $timestamps = false;
}
