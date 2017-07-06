<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Qqtz extends Model
{
    //关联数据库表名
    protected $table = 'community_classify';


    //设置created_at和updated_at不再表中
    public $timestamps = false;

    //设置允许添加的字段
    protected $fillable = ['CName', 'CDesc'];

}
