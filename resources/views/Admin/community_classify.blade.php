{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

        <!-- 当前位置 -->
        <div id="urHere">管理中心<b>></b><strong>社区分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="add_community" class="actionBtn add">添加分类</a>社区分类</h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th width="120" align="left">分类ID</th>
                    <th align="left">分类名称</th>
                    <th align="left">社区描述</th>
                    <th width="60" align="center">社区个数</th>
                    <th width="60" align="center">状态</th>
                    <th width="80" align="center">操作</th>
                </tr>
                @foreach($qqtz as $item)
                <tr>
                    <td align="left">{{$item['ID']}}</td>
                    <td><a href="{{url('subcommunity')}}/{{$item['ID']}}/{{$item['CName']}}">{{$item['CName']}}</a></td>
                    <td>{{$item['CDesc']}}</td>
                    <td align="center">{{$item['CNum']}}</td>
                    <td align="center">{{$item['CStatus'] == 1?'隐藏':'显示'}}</td>
                    <td align="center"><a href="{{url('edit_community')}}/{{$item['ID']}}">编辑</a> | <a href="{{url('dele_community')}}/{{$item['ID']}}">删除</a></td>
                </tr>
                @endforeach
            </table>
        </div>

@endsection


