{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '贴子')

@section('type')
	@parent
	<link rel="stylesheet" type="text/css" href="/home/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/home/css/hot.css">
	<script src="/home/js/jquery-2.1.1.min.js"></script>
	<script src="/home/js/hot.js"></script>
	<script src="/home/js/hot1.js"></script>
	<script src="/home/js/jaliswall.js"></script>
	<script src="/home/js/post.js"></script>



@endsection
{{--主内容--}}
@section('content')
	<div class="container interval">

		<div class="col-md-12 article" id="explain">

		</div>

		<div class="article wall-column" id='box'>
			@if (!(session('user')== null))
				<p id="end"><a href="javascript:void(0);" class="sign"><span class="article"  id="sign-span">{{$time}}</span></a></p>
			@endif

			<p><span class="article" >欢迎加入本小组</span></p>
			{{--<p><span class="article" >3.排行</span></p>--}}
			{{--<p><span class="article" >4.排行</span></p>--}}
			{{--<p><span class="article" >5.排行</span></p>--}}
			{{--<p><span class="article" >6.排行</span></p>--}}



		</div>

		<div class="wall">



			@foreach ($result as $hot)
				<div class="article">

						<img src="{{$hot->picture}}" />
					{{--点击标题重新开启一个新的页面--}}
					<a href="/home/Answer/{{$hot->id}}&{{$Tname->SName}}" target="view_window">
						<h2>{{$hot->headline}}</h2>
					</a>
				</div>
			@endforeach
		</div>

	</div>

		{{--编辑框--}}
	<ul class="fixation">
		@if(!(session('user')== null))
		<li><a href="javascript:void(0);" class="message article" id="release">发帖</a></li>
		@endif
		<li   class="article" style=";width:25px;line-height:25px; padding-left: 6px; margin-left: 12px;color: #4ba733;">{{$Tname->SName}}</li>

	</ul>

	<div class="container  invitation" id="redact">
		<!-- 关闭按钮 -->
		<a href="javascript:void(0);" id="close"></a>
		<div class="col-md-12">
			<b class="invitation-b margin">发布新贴</b>
		</div>
		<form action="/home/message/store" method='post' enctype='multipart/form-data'>
			<input type="hidden" name="F_id"  value="{{$Tname->ID}} " id="F_id"">
					@if(!(session('user') ==  null))
						<input type="hidden" name="U_id"  value="{{session('user')->UserID}}" id="U_id">
					@endif

			{{ csrf_field() }}
			<div class="col-md-8 margin">
				<input type="file" id="inputs"  accept="image/png,image/gif,image/jpeg" name="picture">上传封面

			</div>
			<div id="dd" class="col-md-3"></div>

			<div class="col-md-8 margin">
				<input type="text" placeholder="请输入话题" name="headline">
			</div>

			<div class="col-md-8">
				<textarea name="content" id="" cols="113" rows="10" class="restore-text" ></textarea>


			</div>

			<div class="col-md-9">
				<input type="submit" value=" 发表 " id="button">
			</div>


		</form>
	</div>

@endsection


	


	


