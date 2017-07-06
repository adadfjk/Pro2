{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '首页')

@section('type')
    @parent
    <link rel="stylesheet" type="text/css" href="/home/css/index.css">
    <link rel="stylesheet" type="text/css" href="/home/css/zzsc.css">
    <link rel="stylesheet" type="text/css" href="/home/css/skin.min.css">
    <script src="/home/js/jquery-1.5.2.min.js"></script>
    <script src="/home/js/jquery.pixelentity.kenburnsslider.min.js"></script>
    <script src="/home/js/index.js"></script>
    <script src="/home/js/show.js"></script>

@endsection
{{--主内容--}}
@section('content')
    <div class="container interval">
        <div class="col-md-12">


            <div id="annotation">
                <div id="wrapper" class="container_16">

                    <div class="peKenBurns peNoJs" data-autopause="image" data-thumb="enabled" data-mode="kb" data-controls="always" data-shadow="enabled" data-logo="enabled">

                        @foreach($hdp as $list)
                        <div class="peKb_active" data-delay="5" data-thumb="{{$list->picture}}">
                            <img src="{{$list->picture}}"  />
                            <h1>{{$list->desc}}</h1>
                        </div>
                        @endforeach



                    </div><!--end peKenBurns slider -->
                </div><!--end wrapper-->
            </div><!--end annotation-->

        </div>




    </div>
    <div class="container">
        <div class="col-md-12">

            <div class="col-md-9">
                <div class="col-md-12 headline">
                    <span>热门社区</span>
                </div>


                @foreach($class as $cs)
                <div class="col-md-6" style="height: 240px;">
                    <span class="type">{{$cs->CName}}</span>
                    <ul>

                        <li>
                            <div class="headline-left">
                                <b>
                                    <img src="" alt="" class="headline-img">
                                </b>
                            </div>


                            <div class="headline-right">
                                <span>{{$cs->CDesc}}</span>
                                {{--<p>它的结构特点就是用一个热敏玻璃球堵塞在喷头的... </p>--}}
                            </div>

                        </li>
                        <p></p>
                        <div class="show" value="{{$cs->ID}}">

                        </div>

                    </ul>

                </div>

                @endforeach



            </div>

            <div class="col-md-3 ">
                @if(!(session('user') ==  null))
                <div class="col-md-12 user-header">


                        <div class="user-header-">
                            <div class="col-md-12 ">

                                <img src="{{empty(session('user')->UserIcon)?'imgs/logo.jpg':session('user')->UserIcon}}" alt="">
                                <a href="#">{{session('user')->UserName}} </a>

                            </div>

                            <a href="/personal"><div>进入动态</div></a>

                        </div>

                    @endif

                </div>

                <div class="group">
                    <span>热门小组</span>
                </div>
                @foreach($squad as $sq)
                <p><img src="/imgs/logo.jpg" style="width: 40px; height: 40px;">
                    <a href="/home/message/{{$sq->ID}}"><span>{{$sq->SName}}</span></a>
                </p>
                @endforeach
            </div>

        </div>

    </div>
@endsection