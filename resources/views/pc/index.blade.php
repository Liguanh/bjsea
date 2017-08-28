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
                        <li><a href="/" target="_blank" style="color:#ff0000;">{{$value['title']}}</a></li>
                    @endforeach
                    <li ><a class="show-more" target="_blank" href="{dede:global.cfg_cmsurl/}/plus/list_member.php">会员证查询</a> <a class="show-more" target="_blank" href="{dede:global.cfg_cmsurl/}/plus/list_form.php?sign=1">&nbsp;比赛报名&nbsp;</a></li>
                    </ul>
                 </p>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
     </div>
</div>
@endsection
