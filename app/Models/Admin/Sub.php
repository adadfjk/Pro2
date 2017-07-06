<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    //关联数据库表名
    protected $table = 'subcommunity';

    //设置created_at和updated_at不再表中
    public $timestamps = false;

    //设置白名单
    protected $fillable = ['SName', 'SDesc', 'CID', 'backdrop'];
}
