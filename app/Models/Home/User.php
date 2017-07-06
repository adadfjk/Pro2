<?php

namespace App\Models\Home;

use App\Exceptions\Handler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    //设置不允许添加的字段
    protected $guarded = ['_token', 'repass', 'captcha', 'random_code'];

    //在添加数据库的时候，对某些字段进行额外的处理
    public function setUserPassAttribute($value)
    {
        $this->attributes['UserPass'] = Hash::make($value);
    }
}
