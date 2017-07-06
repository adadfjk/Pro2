<?php

namespace App\Models\Admin;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    //设置允许添加的字段
    protected $fillable = ['name', 'display_name', 'description'];
}
