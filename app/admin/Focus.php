<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{
    protected $pk ='f_id';
    protected $table = 'focus';
    public $timestamps = false;
}
