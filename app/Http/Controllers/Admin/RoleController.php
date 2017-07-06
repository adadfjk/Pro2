<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    //显示权限
    public function roleList()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $perms = array();
            foreach ($role->perms as $perm) {
                $perms[] = $perm->display_name;
            }
            $role->perms= implode(',', $perms);
        }
        return view('Admin.roleList', compact('roles'));
    }

    //添加角色
    public function roleAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $role = Role::create($request->all());
            return redirect('admin/list_role');
        }
        return view('admin.add_role');
    }

    //编辑角色
    public function roleEdit(Request $request, $role_id)
    {
        if($request->isMethod('post')){
            $role = Role::findOrFail($role_id);
            $role->update($request->all());
            return redirect('admin/list_role');
        }
        $role = Role::findOrFail($role_id);
        return view('Admin.edit_role', compact('role'));
    }

    //给角色分配权限
    public function attachPermission(Request $request, $role_id)
    {
        if ($request->isMethod('post')) {
            //获取当前用户的角色
            $role = Role::find($role_id);
            //先将所以的权限删除
            DB::table('permission_role')->where('role_id', $role_id)->delete();
            //重新分配权限
            foreach ($request->input('permission_id') as $permission_id){
                $role->attachPermission(Permission::find($permission_id));
            }
            return redirect('admin/list_role');
        }
        //查询所有的权限
        $permissions = Permission::all();
        return view('Admin.attach_Permission', compact('permissions'));
    }

    //删除角色
    public function roleDele($role_id)
    {
        //删除信息
        Role::where('id', $role_id)->delete();
        return redirect('admin/list_role');
    }
}
