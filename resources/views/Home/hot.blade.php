{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '热帖')

@section('type')
	@parent
	<link rel="stylesheet" type="text/css" href="home/css/hot.css">
	<link rel="stylesheet" type="text/css" href="home/css/styles.css">
	<script src="home/js/jquery-2.1.1.min.js"></script>
	<script src="home/js/hot.js"></script>
	<script src="home/js/jaliswall.js"></script>

@endsection
{{--主内容--}}
@section('content')
	<div class="container">

		<div class="col-md-12 article" id="explain">

		</div>


		<div class="wall">

			@foreach($list as $result)
			<div class="article">
				<img src="{{$result->picture}}" />
				<a href="/home/Answer/{{$result->id}}&{{$result->SName}}"><h2>{{$result->headline}}</h2></a>
			</div>
				@endforeach

		</div>

	</div>

@endsection


	


	


