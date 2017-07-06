<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--标题--}}
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/admin/css/public.css">
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/global.js"></script>



    {{--引入的css 和js文件--}}
    @section('type')
        {{--<link rel="stylesheet" href="home/css/head.css">--}}
        {{--<script src="home/js/head.js"></script>--}}
    @show
</head>
<body>

@section('left')
    <div id="dcWrap"> <div id="dcHead">
            <div id="head">
                <div class="logo"><img src="/imgs/logo.jpg" alt="logo"></div>
                <div class="nav">

                    <ul class="navRight">
                        <li class="M noLeft">
                            @if (session('admin'))
                            <a href="JavaScript:void(0);">您好，{{session('admin')->username}}</a>
                            @endif
                        </li>
                        <li class="noRight"><a href="{{url('admin/logout')}}">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- dcHead 结束 -->
        <div id="dcLeft"><div id="menu">
                <ul class="top">
                    <li><a href="admin1"><i class="home"></i><em>管理首页</em></a></li>
                </ul>
                <ul>
                    <li><a href="{{url('admin/admin')}}"><i class="manager"></i><em>网站管理员</em></a></li>
                    <li><a href="{{url('admin/users')}}"><i class="nav"></i><em>用户管理</em></a></li>
                    <li><a href="{{url('admin/list_permission')}}"><i class="show"></i><em>权限管理</em></a></li>
                    <li><a href="{{url('admin/list_role')}}"><i class="page"></i><em>角色管理</em></a></li>
                </ul>
                <ul>
                    <li><a href="{{url('community_classify')}}"><i class="productCat"></i><em>社区分类</em></a></li>
                    <li><a href="{{url('list_subcommunity')}}"><i class="product"></i><em>社区排行</em></a></li>
                </ul>
                <ul>
                    <li><a href="{{url('admin/list_slideshow')}}"><i class="articleCat"></i><em>幻灯片管理</em></a></li>

                </ul>
                <ul class="bot">
                    <li><a href="/admin/inform"><i class="backup"></i><em>通知</em></a></li>

                </ul>
            </div>
        </div>
@show


        <div id="dcMain" > <!-- 当前位置 -->
            {{--内容页--}}
            @section('right')

            @show
        </div><!-- dcFooter 结束 -->
        <div class="clear"></div>



</div>
</body>
</html>