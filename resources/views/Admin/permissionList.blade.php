{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>权限管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('admin/add_permission')}}" class="actionBtn add">添加权限</a>权限列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">ID</th>
                <th width="300" align="left">权限路由</th>
                <th align="left">权限名称</th>
                <th align="left">权限描述</th>
                <th width="80" align="center">操作</th>
            </tr>
            @forelse($permissions as $permission)
                <tr>
                    <td class="tc">{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->display_name}}</td>
                    <td>{{$permission->description}}</td>
                    <td align="center">
                        <a href="{{url('admin/edit_permission')}}/{{$permission->id}}">编辑</a>&nbsp;|&nbsp;<a href="{{url('admin/dele_permission')}}/{{$permission->id}}">删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">当前暂无权限管理</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection