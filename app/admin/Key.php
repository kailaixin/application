<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $pk = 'key_id';
    protected $table ='attribute_key';
    public $timestamps = false;
}
