<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //访问登录页面
    public function loginForm()
    {
        return view('Admin.login');
    }

    //验证登录数据
    public function doLogin(Request $request)
    {
        //判断用户名和密码是否正确
        $admin = Admin::where('username', $request->username)->first();
        //如果用户存在判断密码是否正确，采用hash提供的check方法进行验证
        if (Hash::check($request->password, $admin->password)) {
            //将当前的用户的数据添加到session中
            $request->session()->put('admin', $admin);
            return redirect('admin1');
        } else {
            return back();
        }
    }

    //退出登录
    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('admin/login');
    }

    //管理员模块
    public function admin()
    {
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $roles = array();
            //得到所以的角色的名称
            foreach ($admin->roles as $role) {
                $roles[] = $role->display_name;
            }
            //转为以逗号分割字符串
            $admin->roles= implode(',', $roles);
        }
        return view ('Admin.admin')->with('admins', $admins);
    }

    //添加管理员
    public function add()
    {
        return view('Admin.add_admin');
    }

    //添加管理员数据到数据库
    public function doAdd(Request $request)
    {
        $result =  Admin::create($request->all());
        if ($result) {
            return redirect('admin/admin');
        } else {
            return back();
        }
    }

    //管理员编辑页面
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->get()->first();
        return view('Admin.edit_admin')->with('admin', $admin);
    }

    //编辑管理员数据到数据库
    public function doEdit(Request $request)
    {
        $admin = Admin::where('id', $request->id)->first();
        if ($request->oldPass == '') {
            Admin::where('id', $request->id)->update(['username' => $request->username, 'status' => $request->status]);
        } elseif (Hash::check($request->oldPass, $admin->password)) {
            Admin::where('id', $request->id)->update(['username' => $request->username, 'status' => $request->status, 'password' => Hash::make($request->newPass)]);
        } else {
            return back()->with('errorMess', '原密码不正确');
        }
        return redirect('admin/admin');
    }

    //删除管理员
    public function dele($id)
    {
        $result = Admin::where('id', $id)->delete();
        if ($result) {
            return redirect('admin/admin');
        } else {
            return back();
        }
    }

    //分配角色
    public function attachRole(Request $request,$admin_id)
    {
        if ($request->isMethod('post')) {
            //获取当前用户的角色
            $admin = Admin::find($admin_id);
            //将所有角色删除，
            DB::table('role_admin')->where('admin_id', $admin_id)->delete();
            //分配新的角色
            foreach ($request->input('role_id') as $role_id){
                //trait中的一个方法。
                $admin->attachRole(Role::find($role_id));
            }
            return redirect('admin/admin');
        }
        //查询所有的权限
        $roles = Role::all();
        return view('Admin.attach_role', compact('roles'));
    }

}
