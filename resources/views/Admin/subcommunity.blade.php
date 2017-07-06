{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>社区分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('add_subcommunity')}}/{{$id}}" class="actionBtn add">添加社区</a>{{$name}}</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="120" align="left">社区ID</th>
                <th align="left">社区名称</th>
                <th align="left">社区描述</th>
                <th width="60" align="center">社区成员</th>
                <th width="60" align="center">社区发帖</th>
                <th width="60" align="center">状态</th>
                <th width="80" align="center">操作</th>
            </tr>
            @forelse($sub as $item)
                <tr>
                    <td align="left">{{$item['ID']}}</td>
                    <td><a href="{{url('subcommunity')}}/{{$item['ID']}}">{{$item['SName']}}</a></td>
                    <td>{{$item['SDesc']}}</td>
                    <td align="center">{{$item['SNum']}}</td>
                    <td align="center">{{$item['SPost']}}</td>
                    <td align="center">{{$item['Status'] == 1?'隐藏':'显示'}}</td>
                    <td align="center"><a href="{{url('edit_subcommunity')}}/{{$item['ID']}}/{{$id}}/{{$name}}">编辑</a> | <a href="{{url('del_subcommunity')}}/{{$item['ID']}}/{{$id}}/{{$name}}">删除</a></td>
                </tr>
                @empty
                <tr>
                    <td align="center" colspan="7">当前分类暂无社区</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection