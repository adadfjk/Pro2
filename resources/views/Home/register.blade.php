{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '热帖')

@section('type')
    @parent
    <link rel="stylesheet" type="text/css" href="/home/css/gui.css">
    <link rel="stylesheet" type="text/css" href="/home/css/login-reg.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/home/js/register.js"></script>

@endsection
{{--主内容--}}
@section('content')
    <div class="container">
        <div class="col-sm-12">

            <div class="wrap grow gmt30 gpack ">
                <div class="col-sm-2"></div>
                <div class="gspan-20 gprefix-4 main col-sm-10">
                    <h1>欢迎加入瓜皮</h1>
                    <form class="gform m-reg-form" id="regForm" action="{{url('doRegister')}}" method="POST">
                        {{csrf_field()}}
                        <p class="gform-box">
                            <input class="gbtxt gbtxt-20" id="phone" maxlength="11" name="UserPhone" placeholder="手机号" required="" type="text" value="">
                            <span class="tip"></span>
                        </p>
                        <p class="gform-box">
                            <input class="gbtxt gbtxt-20" id="pass" name="UserPass" placeholder="密码" required="" type="password" value="">
                            <span class="tip"></span>
                        </p>
                        <p class="gform-box">
                            <input class="gbtxt gbtxt-20" id="repass" name="repass" placeholder="确认密码" required="" type="password" value="">
                            <span class="tip"></span>
                        </p>
                        <div class="gform-box gform-vcode-box">
                            <input class="gbtxt form-txt-mobile-vcode gbtxt-10" id="captcha" maxlength="4" name="captcha" required="" placeholder="请填写右侧字符" type="text" value="">
                            <img src="{{ 'captcha' }}" id="captchaImage" class="captcha">
                            <a class="change-captchaimage" id="changeCaptchaImage" href="javascript:void(0)">
                                <img src="/imgs/refresh.png" width="25" height="25">
                            </a>
                            <span id='captchaMess' class="tip">
                            </span>
                        </div>
                        <p class="gform-box gform-pass-box">
                            <input class="gbtxt form-txt-mobile-vcode gbtxt-10" maxlength="4" id="random_code" name="random_code" required="" placeholder="请填写手机验证码" type="text" value="">
                            <a id="sendCodeBtn" class="gform-send-code" href="javascript: void 0;">发送验证码</a>
                            <span id="smsMess" class="tip"></span>
                        </p>
                        <p class="gform-box">
                            <input type="submit" class="gform-submit greg-btn" value="注册">
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection