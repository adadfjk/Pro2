{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')


{{--引入的css 和js文件--}}
@section('type')
    @parent

    <script src="/admin/js/inform.js"></script>
@show

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>消息通知</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="/admin/inform/add1" class="actionBtn add">添加通知</a>通知列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="60" align="left">消息ID</th>
                <th align="center">内容</th>
                <th width="60" align="left">状态</th>
                <th width="60" align="center">发送时间</th>

                <th width="80" align="center">操作</th>
            </tr>

            @foreach($result as $a)
                <tr>
                    <td align="left" class="inform-id">{{$a->id}}</td>
                    <td align="left">{{$a->content}}</td>
                    <td align="center" class="status">{{$a->status == 0 ? "未发送":"已发送" }}</td>
                    <td align="center">{{$a->up_time}}</td>
                    <td align="center" class="inform-status">{{$a->status == 0 ? "发送通知":"已经发送"}}</td>

                </tr>
            @endforeach
                <tr>
                    <td align="center" colspan="6">{{$result->links()}}</td>
                </tr>

        </table>
    </div>

@endsection