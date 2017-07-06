{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--引用jquery插件--}}
@section('type')
    <script src="/js/jquery-1.8.3.min.js"></script>
@endsection

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>编辑管理员</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="{{url('admin/doEdit')}}" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">昵称</td>
                    <td>
                        <input type="text" name="username" value="{{$admin['username']}}" size="40" class="inpMain">
                    </td>
                </tr>
                <tr>
                    <td align="right">密码</td>
                    <td>
                        <a id="btn" class="btn" href="javascript:void(0)">修改</a>
                        @if(session('errorMess'))
                            <span id="error" style="color:red">{{session('errorMess')}}</span>
                        @endif
                    </td>
                </tr>
                <tr class="showpass">
                    <td align="right">原密码</td>
                    <td>
                        <input type="password" name="oldPass" minlength="6"  value="" size="40" class="inpMain oldPass">
                    </td>
                </tr>
                <tr class="showpass">
                    <td align="right">新密码</td>
                    <td>
                        <input type="password" name="newPass" minlength="6" value="" size="40" class="inpMain">
                    </td>
                </tr>
                <tr>
                    <td align="right">状态</td>
                    <td>
                        <select name="status" value="{{$admin['status']}}">
                            <option value="1">激活</option>
                            <option value="0">禁用</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$admin['id']}}">
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        $(function () {
            $('.showpass').hide();
            $('#btn').click(function () {
                $('.showpass').show('');
            })
            $('.oldPass').focus(function () {
                $('#error').hide();
            })
        })
    </script>

@endsection