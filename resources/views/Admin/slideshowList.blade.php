{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>幻灯片管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('admin/add_slideshow')}}" class="actionBtn add">添加幻灯片</a>幻灯片列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">ID</th>
                <th width="200" align="left">图片</th>
                <th align="left">推荐寄语</th>
                <th width="130" align="center">操作</th>
            </tr>
            @forelse($slides as $slide)
                <tr>
                    <td class="tc">{{$slide->id}}</td>
                    <td><img src="{{'/'.$slide->picture}}" width="80" height="60"></td>
                    <td>{{$slide->desc}}</td>
                    <td align="center">
                        <a href="{{url('admin/edit_slideshow')}}/{{$slide->id}}">编辑</a>&nbsp;|&nbsp;<a href="{{url('admin/dele_slideshow')}}/{{$slide->id}}">删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">当前暂无幻灯片</td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection