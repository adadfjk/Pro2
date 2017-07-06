<?php

namespace App\Models\Admin;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Model
{
    use Notifiable;
    use EntrustUserTrait;
    //设置允许添加的字段
    protected $fillable = ['username', 'password', 'status'];

    //在添加数据库的时候，对某些字段进行额外的处理
    public function setpasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
