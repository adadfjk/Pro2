{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>分配权限</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right" width="200px">分配权限</td>
                    <td>
                        @foreach($permissions as $permission)
                            <label><input type="checkbox" name="permission_id[]" value="{{$permission->id}}">{{$permission->display_name}}</label>
                        @endforeach
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