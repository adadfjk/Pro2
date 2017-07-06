{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '热帖')

@section('type')
	@parent
	<link rel="stylesheet" type="text/css" href="/home/css/gui.css">
	<link rel="stylesheet" type="text/css" href="/home/css/login-reg.css">

	<script src="/home/js/login.js"></script>



@endsection
{{--主内容--}}
@section('content')
	<div class="container">
		<div class="col-sm-12">

			<div class="wrap grow gmt30 gpack">


				<div class="col-sm-4"></div>

				<div class="gspan-20 main  col-sm-8">
					<h1>欢迎登简单社区</h1>
					<form class="gform" id="loginForm" action="{{url('/')}}" method="post">
						{{csrf_field()}}
						<p class="gform-box">
							<input class="gbtxt gbtxt-20" id="phone" maxlength="11" name="phone" placeholder="手机号" required="" type="text" value="">
							<span class="tip"></span>
						</p>
						<p class="gform-box">
							<input class="gbtxt gbtxt-20" id="pass" name="password" placeholder="密码" required="" type="password" value="">
							<span class="tip"></span>
						</p>
						<div>
							<input class="gbtxt form-txt-mobile-vcode gbtxt-18" id="captcha" maxlength="4" name="captcha" placeholder="验证码" type="text" value="">
							<img src="{{ url('captcha')}}" id="captchaImage" class="captcha">
							<a class="change-captchaimage" id="changeCaptchaImage" href="javascript:void(0)">
								<img src="/imgs/refresh.png" width="25" height="25">
							</a>
							<span id="captchaMess" class="login-error tip"></span>
						</div>
						<p class="gform-box gform-rem">
							<input checked="" id="permanent" name="permanent" type="checkbox" value="y">
							<label for="permanent">记住我（网吧或别人的电脑请不要勾选）</label>
							<span class="tip"></span>
						</p>
						<p class="gform-box">
							<input type="submit" class="gform-submit greg-btn" value="登录">
							<a class="gform-forget_pw" href="/home/find/show">忘记密码？</a>
						</p>
					</form>
				</div>


			</div>


		</div>

	</div>


@endsection