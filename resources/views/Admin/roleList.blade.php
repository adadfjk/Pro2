{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>角色管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('admin/add_role')}}" class="actionBtn add">添加角色</a>角色列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">ID</th>
                <th width="100" align="left">角色</th>
                <th width="150" align="left">角色名称</th>
                <th align="left">角色描述</th>
                <th align="left">角色权限</th>
                <th width="130" align="center">操作</th>
            </tr>
            @forelse($roles as $role)
                <tr>
                    <td class="tc">{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>{{$role->perms}}</td>
                    <td align="center">
                        <a href="{{url('admin/attach_permission')}}/{{$role->id}}">分配权限</a> | <a href="{{url('admin/edit_role')}}/{{$role->id}}">编辑</a>&nbsp;|&nbsp;<a href="{{url('admin/dele_role')}}/{{$role->id}}">删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">当前暂无角色管理</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection