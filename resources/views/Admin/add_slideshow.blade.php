{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>添加幻灯片</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="" method="post" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td align="right">幻灯片</td>
                    <td>
                        <input type="file" name="picture" />
                    </td>
                </tr>
                <tr>
                    <td align="right">推荐寄语</td>
                    <td>
                        <textarea name="desc" cols="60" rows="4" class="textArea"></textarea>
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