{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '社区分类')

@section('type')
	@parent
	<link rel="stylesheet" href="home/css/classify.css">
	<script src="home/js/classify.js"></script>
@endsection
{{--主内容--}}
@section('content')
	<div class="container"  id="classify" >

		@foreach($data as $key => $value)
		<div class="col-md-12 categorys-hd">
			<!-- 标题 -->
			<div class="title-b">
				<div class="title">
					<span>{{$key}}</span>
					<a href="javascript:void 0;" >1</a>
				</div>
			</div>	
		
			@foreach($value as $k => $val)
			<!-- 内容 -->
			<div class="col-md-2  ">
				<img src="imgs/logo.jpg" alt="">
				<a href="/home/message/{{$k}}"><b>{{$val}}</b></a>
				
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
@endsection