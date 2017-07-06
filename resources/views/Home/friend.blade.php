{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '首页')
@section('type')
	@parent

	<link rel="stylesheet" type="text/css" href="home/css/friend.css">
	<script src="home/js/friend.js"></script>
@endsection
{{--主内容--}}
@section('content')
	<div class="container">
		<div class="col-md-12 box1">
			<div class="col-md-1">

			</div>
			<!-- 好友列表框 -->
			<div class="col-md-2 padding">
				<div class="friend">
					<b>好友信息</b>
				</div>

				<ul class="list-unstyled">
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>

					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>

					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<img src="imgs/logo.jpg" class="img-circle Timg">
						<span>姓名</span>
					</li>
					<li>
						<span><a href="">查看更多</a></span>
					</li>
				</ul>

			</div>


			<!-- 聊天框 -->
			<div class="col-md-8 padding  ">
				<div class="news padding">

				</div>
				<div class="chat padding" >

				</div>

				<!-- 表情包 -->
				<div class="bs-example " data-example-id="bordered-table">
					<table class="table table-bordered">
						<tbody id="expression">
						<tr>

							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f01.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f02.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f03.png"></a></td>
						</tr>
						<tr>

							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f04.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f05.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f06.png"></a></td>
						</tr>
						<tr>

							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f07.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f08.png"></a></td>
							<td><a href="javascript:void 0;" ><img src="imgs/表情包/i_f09.png"></a></td>
						</tr>
						</tbody>
					</table>
				</div>

				<div class="padding list">
					<a href="javascript:void 0;" id="face"><img src="imgs/emotion-1.png"></a>
				</div>
				<!-- 文本编辑器 -->
				<div class="box col-md-8 padding ">

					<div class="col-md-10 padding " id="content">

						<p contenteditable="true" id="editor" class=" padding "></p>
					</div>

					<div class=" col-md-2 send">
						<a href="javascript:void 0;" class="">发送</a>
					</div>
				</div>

			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

@endsection
