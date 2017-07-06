<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    //设置created_at和updated_at不再表中
    public $timestamps = false;

    //关联数据库表名
    protected $table = 'slideshows';

    //白名单
    protected $fillable = ['desc', 'picture'];
}
