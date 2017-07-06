{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>编辑角色</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">角色</td>
                    <td>
                        <input type="text" name="name" value="{{$role->name}}" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">角色名称</td>
                    <td>
                        <input type="text" name="display_name" value="{{$role->display_name}}" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">角色描述</td>
                    <td>
                        <textarea name="description" cols="60" rows="4" class="textArea">{{$role->description}}</textarea>
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