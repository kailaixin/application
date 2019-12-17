<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table='user';
    public $primaryKey="u_id";
    public $timestamps=false;
    protected $fillable=['nick','email','tel','age','sex','headimg','last_time','create_time'];
}
