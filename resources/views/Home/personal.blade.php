{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '首页')

@section('type')
	@parent
	<link rel="stylesheet" href="home/css/personal.css">
	<script src="home/js/personal.js"></script>
	<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>

@endsection
{{--主内容--}}
@section('content')
	<div class="container  interval">
		<div class="col-md-3 personal">
			<!-- 好友头像 -->
			<div class="icon">
				<img class="img" src="{{empty(session('user')->UserIcon)?'imgs/logo.jpg':session('user')->UserIcon}}" alt=""  class="img-circle" width="140" height="140">
				<p></p>
				<p><span>{{empty(session('user')->UserName)?session('user')->UserPhone:session('user')->UserName}}</span></p>
				<p style="margin-top: -18px"><span style="font-size: 10px;margin-left: -25px">会员等级：<img id="level" src="home/imgs/lv{{empty(session('user')->level)?1:session('user')->level}}.gif"></span></p>
			</div>
			<!-- 社区好友 -->
			<div class="attention">
				<ul>
					<li class="col-md-6">
						<a class="singer_r_img" href="javascript:void(0);">
							<span id="sing_for_number"></span>
						</a>
					</li>
					<li class="col-md-6">
						<a href="javascript:void(0)" class="signDesc">
							<span>连续签到{{empty(session('user')->sustaindays)?0:session('user')->sustaindays}}天</span>
							<span>累计签到{{empty(session('user')->sumdays)?0:session('user')->sumdays}}次</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- 个人选项卡 -->
			<div class="select">
				<ul id="option">
					<li class="active">我的社区</li>
					<li>我的帖子</li>
					<li>系统消息</li>
					<li>个人资料</li>
					<li>修改头像</li>



				</ul>
			</div>

		</div>

		<div class="col-md-8">
			<!-- 我的社区 -->
			<div class="box show">
				<div class="titleline">
					<h3>我的社区</h3>
				</div>
				<div class="gform community">
					@foreach($re as $es)
					<a href="/home/message/{{$es->F_id}}"><span>{{$es->F_name}}</span> <span class="grade lv1"></span></a>
					@endforeach
					<!-- 清除浮动 -->
					<div class="clear"></div>
					{{--<span class="more">加载跟多</span>--}}
					<!-- 清除浮动 -->
					<div class="clear"></div>
				</div>


				<div class="recommend" >

					<div id="temp1">
						<a href="javascript:void(0);" id="temp3">获取天气信息</a>


					</div>



				</div>

			</div>

			<!-- 我的帖子 -->
			<div class="box">
				<div class="titleline">
					<h3>我的帖子</h3>
				</div>
				<div class="gform ">

					<div class="post">
						@foreach($req as $li)
						<div>
							<a href="/home/message/{{$li->ID}}">{{$li->SName}}</a>
							<p><span>{{$li->headline}}</span></p>
							<p><img src="{{$li->picture}}" ></p>
						</div>
						@endforeach

					</div>

				</div>

			</div>

			<!-- 我的道具 -->
			<div class="box">
				<div class="titleline">
					<h3>系统通知</h3>
				</div>
				<div class="gform room">

					@foreach($list as $revert)
					<div class=" col-md-12" style="margin-bottom:20px">
						系统通知&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$revert->content}}
					</div>
					@endforeach





				</div>

			</div>

			<!-- 个人资料 -->
			<div class="box">
				<div class="titleline">
					<h3>个人资料</h3>
				</div>
				<div class="gform">
					<form action="user_edit" method="post">
						<ul >
							<li><span>我的昵称:</span> <input type="text" class="length" name="UserName" value="{{session('user')->UserName}}"></li>
							<li><span>我的生日:</span> <input type="date" class="length" name="UserBirthday" value="{{session('user')->UserBirthday}}"></li>
							<li><span>我的邮箱:</span> <input type="text" class="length" name="UserEmail" value="{{session('user')->UserEmail}}"></li>
							<li><span>我的性别:</span> <label><input type="radio"  name="UserSex" value="1" {{session('user')->UserSex == 1?'checked':''}}> 男</label> &nbsp;
								                      <label><input type="radio" name="UserSex" value="2" {{session('user')->UserSex == 2?'checked':''}}> 女</label>
													  <label><input type="radio" name="UserSex" value="3" {{session('user')->UserSex == 3?'checked':''}}> 保密</label>&nbsp;</li>
							<li><span>我的积分:</span> <span id="point">{{session('user')->UserPoint}}</span><span>&nbsp;积分</span></li>

							<li>
								<span>个性签名:</span>
								<textarea class="gttxt" cols="40" name="UserSigned" rows="10">{{session('user')->UserSigned}}</textarea>

							</li>
							<li>
								{{csrf_field()}}
								<input type="submit" value="保存"  class="submit">
							</li>
						</ul>
					</form>
				</div>
			</div>

			<!-- 我的头像 -->
			<div class="box">
				<div class="titleline">
					<h3>修改头像</h3>
				</div>
				<div class="gform head">
					<form action="user_icon" method="post" enctype="multipart/form-data">
						<p>
							{{csrf_field()}}
							<input type="file" name="UserIcon" id="uploading">
							<input type="submit" id="uploadImg" value="上传">
						</p>

						<p>
							（支持gif、jpg、png图片格式，大小不要超过3.5M）
						</p>
					</form>
					<div class="head-div">
						<div class="col-md-3">
							<img src="{{empty(session('user')->UserIcon)?'imgs/logo.jpg':session('user')->UserIcon}}" class="img1 " width="140" height="140">
							<p>大尺寸头像，140×140像素</p>
						</div>

						<div class="col-md-3">
							<img src="{{empty(session('user')->UserIcon)?'imgs/logo.jpg':session('user')->UserIcon}}" class="img2" width="48" height="48">
							<p>大尺寸头像，48×48像素</p>
							<p><img src="{{empty(session('user')->UserIcon)?'imgs/logo.jpg':session('user')->UserIcon}}" class="img3" width="24" height="24"></p>
							<p>大尺寸头像，24×24像素</p>
						</div>






					</div>





				</div>

			</div>



		</div>
	</div>



@endsection
