{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>社区排行</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3>社区排行</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="100" align="center">排名</th>
                <th width="100" align="center">社区ID</th>
                <th align="center">社区名称</th>
                <th align="center">所属分类</th>
                <th width="100" align="center">社区成员</th>
                <th width="100" align="center">社区发帖</th>
            </tr>
            @forelse($subs as $key => $sub)
                <tr>
                    <td align="center">{{$key + 1}}</td>
                    <td align="center">{{$sub['ID']}}</td>
                    <td align="center">{{$sub['SName']}}</td>
                    <td align="center">{{$sub['CName']}}</td>
                    <td align="center">{{$sub['SNum']}}</td>
                    <td align="center">{{$sub['SPost']}}</td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="7">当前分类暂无社区</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection