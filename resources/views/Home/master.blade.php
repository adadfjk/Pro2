<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--标题--}}
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/initialize.css">
    <script src="/js/jquery-1.8.3.min.js"></script>



    {{--引入的css 和js文件--}}
    @section('type')
        <link rel="stylesheet" href="/home/css/head.css">
        <script src="/home/js/head.js"></script>
    @show
</head>
<body>

    @section('head')
        <div class="container nav">


            <div class="col-md-2">
                <img src="/home/imgs/logo.jpg" alt="" class="logo">
            </div>

            <div class="col-md-10">
                <ul>
                    <li id="home"><a href="/">首页</a></li>

                    <span id="sign">
                        <li><a href="/classify">社区</a></li>
                        <li><a href="/hot">热贴</a></li>
                        <li><a href="/personal">我的简单</a></li>
				    </span>
                    <div class="login">
                        @if(session('user'))
                            <li ><a href="javascript:void(0)">{{empty(session('user')->UserName)?session('user')->UserPhone:session('user')->UserName}}</a><a href="{{url('logout')}}">退出</a></li>
                        @else
                            <li ><a href="/login">登录</a><a href="register">注册</a></li>
                        @endif
                    </div>



                </ul>

            </div>

        </div>
        <!-- 标记线 -->
        <div class="wire container"></div>
    @show

    {{--内容页--}}
    @section('content')

    @show


    {{--尾页--}}
    @section('footer')
        <!-- 标记线 -->
        <div class="wire container"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <p>
                        <a href="#">关于我们</a>&nbsp;&nbsp;
                        <a href="#">加入我们</a>&nbsp;&nbsp;
                    </p>

                </div>
                <div class="col-md-5"></div>
            </div>


        </div>
    @show

</body>
</html>