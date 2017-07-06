<?php

namespace App\Models\Admin;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //添加允许设置的字段
    protected $fillable = ['name', 'display_name', 'description'];
}
