<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $pk ='r_id';
    protected $table = 'role';
    public $timestamps = false;
}
