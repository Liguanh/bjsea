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
                    <li ><a class="show-more" target="_blank" href="{dede:global.cfg_cmsurl/}/plus/list_member.php">会员证查询</a> <a class="show-more" target="_blank" href="{dede:global.cfg_cmsurl/}/plus/list_form.php?sign=1">&nbsp;比赛报名&nbsp;</a></li>
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
                  {dede:sql sql="SELECT id,body,title,litpic FROM run_archives a1,run_addonarticle a2 WHERE a1.id=a2.aid and a1.id=1"}
                <h2><a href="[field:arcurl/]" target="_blank">[field:title/]</a></h2>
                <p class="para"> <img src="[field:litpic/]" alt="" class="prev" />
                [field:body function='cn_substr(strip_tags("@me"),900)' /]......
                </p>
                <div class="clear"></div>
                 {/dede:sql}
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
     </div>
</div>
@endsection
