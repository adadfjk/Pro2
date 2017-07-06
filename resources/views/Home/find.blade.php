{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '找回密码')

@section('type')
	@parent
	<link rel="stylesheet" type="text/css" href="/home/css/gui.css">
	<link rel="stylesheet" type="text/css" href="/home/css/login-reg.css">

	<script src="/home/js/find.js"></script>



@endsection
{{--主内容--}}
@section('content')
	<div class="container">
		<div class="col-sm-12">

			<div class="wrap grow gmt30 gpack">


				<div class="col-sm-4"></div>

				<div class="gspan-20 main  col-sm-8">
					<h1>找回密码</h1>
					<form class="gform" id="loginForm" action="/home/find/up" method="post">
						{{csrf_field()}}
						<p class="gform-box">
							<input class="gbtxt gbtxt-20" id="phone" maxlength="11" name="phone" placeholder="手机号" required="" type="text" value="">
							<span class="tip"></span>
						</p>

						<p class="gform-box" id="find-e" style="display:none;">
							<input class="gbtxt gbtxt-20" id="email"  name="email" placeholder="邮箱" required="" type="text" value="">
							<span class="tip"></span>
						</p>

						<div id="find-p" style="display:none;">

							<p class="gform-box">
								<input class="gbtxt gbtxt-20" id="pass1" name="password1" placeholder="密码" required="" type="password" value="">
								<span class="tip"></span>
							</p>

							<p class="gform-box">
								<input class="gbtxt gbtxt-20" id="pass" name="password" placeholder="确认密码" required="" type="password" value="">
								<span class="tip"></span>
							</p>


							<p class="gform-box">
								<input type="submit" id="submit" class="gform-submit greg-btn" value="确认修改" style="display:none;">
							</p>

						</div>
					</form>
				</div>


			</div>


		</div>

	</div>


@endsection