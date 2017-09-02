@extends('pc.common.layout')
@section('content')
<div class="content">
        <div class="container">

        <!--第1帧-->
            <div class="brand">
                <div class="col-md-8 main">
                    <div class="flexslider">
                            <ul class="slides">
                                @foreach($slide as $key=>$val)
                                <li>
                                <span class="txtbg"><a href="/">{{$val['title']}}</a></span>
                                <a href="/" target="_blank"><img src="{{$val['little_pic']}}" alt="" /></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- FlexSlider -->
                              <script type="text/javascript" src="{{asset('bjesa/js/jquery.flexslider.js')}}"></script>
                              <script type="text/javascript">
                                $(function(){
                                  SyntaxHighlighter.all();
                                });
                                $(window).load(function(){
                                  $('.flexslider').flexslider({
                                    animation: "slide",
                                    start: function(slider){
                                      $('body').removeClass('loading');
                                    }
                                  });
                                });
                              </script>
                        <!-- FlexSlider -->
                </div>
                <div class="col-md-4">

                <div class="right-box">
                <p>
                    <ul>
                    @foreach($top as $key=>$value)
                        <li><a href="/" target="_blank" >{{$value['title']}}</a></li>
                    @endforeach
                    <li ><a class="show-more" target="_blank" href="">会员证查询</a> <a class="show-more" target="_blank" href="">&nbsp;比赛报名&nbsp;</a></li>
                    </ul>
                 </p>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
    <!--第2帧-->
            <div class="brand">
                <div class="col-md-8 main">
                 <div class="left-box">
                <h2><a href="/" target="_blank">{{$desc['title']}}</a></h2>
                <p class="para"> <img src="{{$desc['little_pic']}}" alt="" class="prev" />
					{{ App\Tools\ToolStr::hideStr($desc['content'], 460, '....') }}
                </p>
                <div class="clear"></div>
                <p class="more"><a href="{dede:global.cfg_cmspath/}/plus/view.php?aid=1" target="_blank">查看更多...</a></p>
                </div>
                </div>
                <div class="col-md-4">
                <div class="right-box">
                    <h2>赛事信息</h2>
                    <ul>
                    @foreach($match as $key=>$value)
                        <li><a href="/" target="_blank" >{{$value['title']}}</a></li>
                    @endforeach
                    </ul>
                </div>
                </div>
                    <div class="clearfix"></div>
            </div>

         <!--第三帧-->
                <div class="brand">
                <div class="col-md-8 main">
                 <script type="text/javascript" src="{{asset('bjesa/js/jquery.flexisel.js')}}"></script>
                <div class="best-seller">

                    <div class="biseller-info" height="80px;">
                     <h3 class="new-models">最新会员</h3>
                    <ul id="flexiselDemo1" >
                    @foreach($members as $key=>$user)
                        <li>
                            <a href="plus/view_member.php?aid=[field:mid/]&mtype=[field:mtype/]" target="_blank"><div class="biseller-column">
                            <img src="{{asset('bjesa/images/member1.png')}}" class="img-responsive" alt="">
                            <div class="mem_img">
                            {{$user['real_name']}} ({{$user['mtype']}})
                            </div>
                                <div class="mem_num">
                                    {{$user['user_number']}}
                                </div>
                            </div></a>
                        </li>
                    @endforeach
                    </ul>
                    </div>

            </div>
            <script type="text/javascript">
                 $(window).load(function() {
                    $("#flexiselDemo1").flexisel({
                        visibleItems: 3,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint:480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });

                });
               </script>
                </div>
                <div class="col-md-4">
                <div class="sellers">
                            <h3 class="m_2">培训信息</h3>
                            @foreach($train as $key=>$value)
                            <div class="best">
                            <h4><a href="/" target="_blank">{{$value['title']}}</a></h4>
                            </div>
                            @endforeach

               </div>
                </div>
            </div>
     </div>
</div>
@endsection
