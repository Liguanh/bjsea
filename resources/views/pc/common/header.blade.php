<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="header-left" >
                <!-- <p>欢迎访问北京市跑酷委员会网站 主管单位:&nbsp;&nbsp;<font style="color:#ff0000;">北京市体育总会 北京市长跑协会</font></p> -->
            </div>
            <div class="login-section" >
                <ul id="_userlogin">

                    <li><a href="{{url('/login')}}" target="_blank">登录</a>  </li> |
                    <li><a href="{{url('/register')}}" target="_blank">注册</a> </li> |
                </ul>
            </div>
            <script language="javascript" type="text/javascript">CheckLogin();</script>
            <script src="{dede:global.cfg_templets_skin/}/js/classie.js"></script>
            <script src="{dede:global.cfg_templets_skin/}/js/uisearch.js"></script>
            <script>
                new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="bottom-header">
        <div class="container">
            <div class="logo">
                <a href="{{url('/')}}"><h1><image src="{{asset('bjesa/images/logo.png')}}" style="height:90px;"></h1></a>
            </div>
            <div class="header_bottom_right">
                <div class="searchform">
                    <form name="formsearch" action="{dede:global.cfg_cmsurl/}/plus/search.php" target="_blank">
                        <input type="hidden" name="kwtype" value="0" />
                        <input type="text" class="searchkey" name="q" id="search" placeholder="输入你要查询的内容">
                        <input class="search-btn" type="submit" value="搜索">
                    </form>
                </div>

                <div class="clearfix"></div>
                <div class="tags"><image src="{{asset('bjesa/images/search.png')}}" style="height:14px;margin-right:10px;">
                        <a href='/plus/search.php?kwtype=0&q=赛事' target="_blank">赛事</a>
                        <a href='/plus/search.php?kwtype=0&q=培训' target="_blank">培训</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header_menu">
        <div class="container">
            <!-- start h_menu4 -->
            <div class="h_menu4">
                <a class="toggleMenu" href="">Menu</a>
                <ul class="nav">
                    <li class="active"><a href="{{url('/')}}">首页</a></li>
                    @foreach($nav as $key=>$value)
                        <li><a href="{{$value['typeLink']}}" class="active" target="_blank">{{$value['name']}}</a>
                         @if(!empty($value['son_list']))
                            <ul>
                                @foreach($value['son_list'] as $id=>$son)
                                    <li><a href="{{$son['typeLink']}}" target="_blank">{{$son['name']}}</a></li>
                                @endforeach
                            </ul>
                          @endif
                        </li>
                    @endforeach
                </ul>
                <script type="text/javascript" src="{{asset('bjesa/js/nav.js')}}"></script>

            </div>
            <!-- end h_menu4 -->
        </div>
    </div>
</div>
<!-- header-section-ends -->
