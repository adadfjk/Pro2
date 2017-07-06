{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>发布通知</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="/admin/inform/add" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">通知内容</td>
                    <td>
                        <textarea name="content" cols="60" rows="4" class="textArea"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        {{csrf_field()}}
                        <input  class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection