{{--引入主模板--}}
@extends('Home.master')
{{--标题名字--}}
@section('title', '帖子')

@section('type')
    @parent
    <link rel="stylesheet" type="text/css" href="/home/css/revert.css">
    <script src="/home/js/revert.js"></script>
    <script src="/js/time.js"></script>
    <script src="/home/js/advices.js"></script>

    <script src="/js/jquery.tmpl.js"></script>
@endsection

@section('head')
    <p></p> <p></p>
@endsection


{{--主内容--}}
@section('content')

    <div class="container"  >
        <div class="col-md-12">
            <div class="col-md-1"></div>
            <div class="col-md-10 ">

                {{--分享--}}
                <div class="bdsharebuttonbox" style="width:20px;position: fixed;right: 18%;bottom: 50%; ">
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

                {{--js 模板--}}
                <script type="text/html" id="temp">


                    <div class="col-md-12 details">
                        <div class="col-md-2 issuer">
                            <ul>
                                <li>
                                    <img src="/imgs/logo.jpg" alt="">
                                </li>
                                <li><a href="">${U_id}</a></li>
                                <li>
                                    <div class="title">踏足灵域</div>
                                </li>
                            </ul>

                        </div>

                        <div class="col-md-10 host-content">
                            <div class="col-md-12 p-content">
                                ${content}
                            </div>


                        </div>
                    </div>
                </script>


                {{--隐藏域--}}

                @if(!(session('user') ==  null))
                    <input type="hidden" id="user"  value="{{session('user')->UserID}}">
                @endif
                <input type="hidden" id="T_id" value="{{$TID}}">

                {{--<input type="hidden" id="token" value="{{csrf_token()}}">--}}

                <!-- 标头 -->

                <div class="headline col-md-12">
                    @foreach($liet as $liets)
                    <img src="/imgs/logo.jpg" class="headline-logo">
                    <span class="community" id="Fname">{{$liets->SName}}</span>
                        <input type="hidden" id="F_id" value="{{$liets->ID}}">

                        @if (session('user')== null)
                            <a href="/login"  value="关注"><img src="/imgs/关注.jpg"></a>
                        @else
                            <a href="javascript:void(0);" id="attention" value="{{$arr}}"><img src="/imgs/{{$arr}}.jpg"></a>


                        @endif





                    <span class="headline-span">关注 :</span>
                    <span class="amount">{{$liets->SNum}}</span>
                    <span class="headline-span">发帖 :</span>
                    <span class="amount">{{$liets->SPost}}</span>

                    @endforeach
                </div>

                <!-- 标题 -->
                <div class="col-md-12 content-title">
                    <span>{{$headline[0]}}</span>
                </div>
                <div class="col-md-12 " id="list">
                    @foreach ($result as $revert)

                    <!-- 回复 -->
                    <div class="col-md-12 details">
                        <div class="col-md-2 issuer">
                            <ul>
                                <li>
                                    <img src="{{$revert->UserIcon}}">
                                </li>
                                <li><a href="javascript:void(0);">{{$revert->UserName}}</a></li>
                                <li>
                                    <div class="title">踏足灵域</div>
                                </li>
                            </ul>

                        </div>

                        <div class="col-md-10 host-content">
                            <div class="col-md-12 p-content">
                                {{$revert->content}}
                            </div>

                            <div class="col-md-12">
                                <div class="p-right">
                                    <span>1楼</span>
                                    <span class="time">{{$revert->content_time}}


                                </span>
                                    <a href=""></a>
                                    <a href="javascript:void(0);" class="right-a" value="{{$revert->id}}" class="publish-a">回复</a>

                                </div>

                            </div>

                            <div class="col-md-12 reply-frame">


                                <div class="col-md-12 reply">
                                    {{--js 模板--}}
                                    <script type="text/html" id="temp1">
                                        <div class="reply-left col-md-12 padding">

                                            <div class="col-md-1">

                                                <img src= "${UserIcon}" >

                                            </div>
                                            <div class="col-md-11 reply-top">
                                                <a href="#">${UserName}</a><span>&nbsp;:&nbsp;</span>

                                                <span>${details}</span>
                                                <div class="col-md-12">
                                                    <div class="reply-time">
                                                        <span class="time1">${up_time}</span><span>&nbsp;回复</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </script>


                                    <div id="id{{$revert->id}}"  class="col-md-12 padding">



                                    </div>




                                    <div class="col-md-12">
                                        @if(!(session('user')== null))
                                            <div class="talk col-md-12">我也说一句</div>
                                        @endif




                                        <div class="p-publish col-md-12 ">
                                            <textarea name="minute"  cols="99" rows="2" class="reply-text" maxlength="140" ></textarea>

                                            <div class="publish" value="{{$revert->id}}">
                                                发表
                                            </div>
                                        </div>

                                    </div>




                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- 结束回复 -->

                     @endforeach
                </div>


                @if(!(session('user')== null))
                    <!-- 回复楼层 -->
                        <div class="col-md-12 restore">
                            <div class="col-md-12">
                                <b>发布回复</b>
                            </div>

                            <div class="col-md-12">

                                <textarea name="content" id="advices" cols="113" rows="10" class="restore-text"></textarea>

                                <div  class="restore-publish" id="send">发布</div>

                            </div>


                        </div>
                @endif









            </div>



        </div>
    </div>

@endsection



@section('footer')
    <p></p> <p></p>
@endsection