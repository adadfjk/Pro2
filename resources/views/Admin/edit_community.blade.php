{{--引入主模板--}}
@extends('admin.master')
{{--标题名字--}}
@section('title', '后台首页')

{{--主内容--}}
@section('right')
    <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>编辑社区分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <form action="{{url('checkEdit/')}}" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td align="right">分类名称</td>
                    <td>
                        <input type="text" name="CName" value="{{$qqtz['CName']}}" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">社区描述</td>
                    <td>
                        <textarea name="CDesc" cols="60" rows="4" class="textArea">{{$qqtz['CDesc']}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">状态</td>
                    <td>

                        <select name="CStatus" value="{{$qqtz['CStatus']}}">
                            <option value="0">显示</option>
                            <option value="1">隐藏</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$qqtz['ID']}}">
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection