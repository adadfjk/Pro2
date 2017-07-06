<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //显示权限列表
    public function permissionList()
    {
        //查询所有的权限
        $permissions = Permission::all();
        return view('Admin.permissionList', compact('permissions'));
    }

    //添加权限表单
    public function permissionAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            //添加权限操作
            $permission = Permission::create($request->all());
            return redirect('admin/list_permission');
        }
        return view('Admin.add_permission');
    }

    //编辑权限
    public function permissionEdit(Request $request, $permission_id)
    {
        //修改用户信息
        if ($request->isMethod('post')) {
            $permission = Permission::findOrFail($permission_id);
            $permission->update($request->all());
            return redirect('admin/list_permission');
        }
        //查询出当前的权限信息
        $permission = Permission::findOrFail($permission_id);
        return view('Admin.edit_permission', compact('permission'));
    }

    //删除权限
    public function permissionDele($permission_id)
    {
        //删除信息
        Permission::destroy([$permission_id]);
        return redirect('admin/list_permission');
    }
}
