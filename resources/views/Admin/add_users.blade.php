{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>添加用户</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="{{url('admin/doAdd')}}" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">昵称</td>
                    <td>
                        <input type="text" name="username" value="" size="40" class="inpMain">
                    </td>
                </tr>
                <tr>
                    <td align="right">密码</td>
                    <td>
                        <input type="password" name="password" minlength="6"  value="" size="40" class="inpMain">
                    </td>
                </tr>
                <tr>
                    <td align="right">确认密码</td>
                    <td>
                        <input type="password" name="repass" minlength="6" value="" size="40" class="inpMain">
                    </td>
                </tr>
                <tr>
                    <td align="right">状态</td>
                    <td>
                        <select name="status" value="">
                            <option value="1" checked>激活</option>
                            <option value="0">禁用</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        {{csrf_field()}}
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>


@endsection