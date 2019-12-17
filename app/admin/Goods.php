<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $pk = 'g_id';
    protected $table ='goods';
    public $timestamps = false;
}
