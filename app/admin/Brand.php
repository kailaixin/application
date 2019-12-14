<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $pk ='b_id';
    protected $table = 'brand';
    public $timestamps = false;
}
