{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>网站管理员</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('admin/add_admin')}}" class="actionBtn add">添加管理员</a>管理员列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">管理员ID</th>
                <th width="100" align="left">用户名</th>
                <th align="left">角色</th>
                <th align="center">创建时间</th>
                <th width="60" align="center">状态</th>
                <th width="130" align="center">操作</th>
            </tr>
            @forelse($admins as $item)
                <tr>
                    <td align="left">{{$item['id']}}</td>
                    <td align="left">{{$item['username']}}</td>
                    <td>{{$item['roles']}}</td>
                    <td align="center">{{$item['created_at']}}</td>
                    <td align="center">{{$item['status'] == 1?'激活':'禁用'}}</td>
                    <td align="center"><a href="{{url('admin/attach_role')}}/{{$item['id']}}">分配角色</a> | <a href="{{url('admin/edit_admin')}}/{{$item['id']}}">编辑</a> | <a href="{{url('admin/dele_admin')}}/{{$item['id']}}">删除</a></td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">当前暂无管理员</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection
