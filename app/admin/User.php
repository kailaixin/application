<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $pk ='u_id';
    protected $table = 'user';
    public $timestamps = false;
}
