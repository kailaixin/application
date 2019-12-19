<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Specs extends Model
{
    protected $pk = 'gs_id';
    protected $table = 'goods_specs';
    public $timestamps = false;
}
