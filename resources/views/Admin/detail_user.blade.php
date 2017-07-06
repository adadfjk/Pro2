{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>用户详情</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="{{url('admin/doAdd')}}" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right" style="width:200px">头像</td>
                    <td align="center">
                        <img src="{{'\\'.$data['UserIcon']}}" alt="" width="48" height="48">
                    </td>
                </tr>
                <tr>
                    <td align="right">昵称</td>
                    <td align="center">
                        {{$data['UserName']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">性别</td>
                    <td align="center">
                        {{$data['UserSex'] == 1?'男':($data['UserSex'] == 2?'女':'保密')}}
                    </td>
                </tr>
                <tr>
                    <td align="right">出生年月</td>
                    <td align="center">
                        {{$data['UserBirthday']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">手机</td>
                    <td align="center">
                        {{$data['UserPhone']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">邮箱</td>
                    <td align="center">
                        {{$data['UserEmail']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">关注社区</td>
                    <td align="center">
                        {{$data['UserCommunity']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">发帖</td>
                    <td align="center">
                        {{$data['UserPostNum']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">个性签名</td>
                    <td align="center">
                        {{$data['UserSigned']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">积分</td>
                    <td align="center">
                        {{$data['UserPoint']}}
                    </td>
                </tr>
                <tr>
                    <td align="right">创建时间</td>
                    <td align="center">
                        {{$data['created_at']}}
                    </td>
                </tr>
            </table>
        </form>
    </div>


@endsection