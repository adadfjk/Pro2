{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>用户管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3>用户列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">用户ID</th>
                <th width="100" align="left">昵称</th>
                <th width="120" align="left">手机</th>
                <th align="center">职权</th>
                <th align="center">发帖数量</th>
                <th align="center">关注社区</th>
                <th align="center">积分</th>
                <th width="60" align="center">状态</th>
                <th align="center">注册时间</th>
                <th width="80" align="center">操作</th>
            </tr>
            @forelse($users as $item)
                <tr>
                    <td align="left">{{$item['UserID']}}</td>
                    <td align="left">{{$item['UserName']}}</td>
                    <td align="left">{{$item['UserPhone']}}</td>
                    <td align="center">{{$item['UserBarOwner'] == 1?'吧主':'普通成员'}}</td>
                    <td align="center">{{$item['UserPostNum']}}</td>
                    <td align="center">{{$item['UserCommunity']}}</td>
                    <td align="center">{{$item['UserPoint']}}</td>
                    <td align="center"><a class="btn" href="{{url('admin/change_status')}}/{{$item['UserID']}}">{{$item['UserShutup'] == 1?'激活':'禁言'}}</a></td>
                    <td align="center">{{$item['created_at']}}</td>
                    <td align="center"><a href="{{url('admin/detail_user')}}/{{$item['UserID']}}">详情</a> | <a href="{{url('admin/dele_user')}}/{{$item['UserID']}}">删除</a></td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">当前暂无用户</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection