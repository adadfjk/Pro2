{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')

    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>添加社区</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="{{url('addSub')}}" method="post" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">社区名称</td>
                    <td>
                        <input type="text" name="SName" value="" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">社区描述</td>
                    <td>
                        <textarea name="SDesc" cols="60" rows="4" class="textArea"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">社区头像</td>
                    <td>
                        <input type="file" name="backdrop">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        {{csrf_field()}}
                        <input type="hidden" name="CID" value="{{$id}}">
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>


@endsection