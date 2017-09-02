@extends('pc.common.layout')
@section('content')
<div class="content">
        <div class="container">
              <div class="dreamcrub">
                      <div class="container">
                         <ul class="breadcrumbs">
                            <li class="home">
                               <a href="{{url('/')}}" title="Go to Home Page"><img src="{{asset('bjesa/images/home.png')}}" alt=""/></a>&nbsp;
                               <a href="{{url('/')}}" title="Go to Home Page">首页 ></a>
                               {!! $position !!}
                            </li>
                         </ul>
                        <div class="clearfix"></div>
                       </div>
                 </div>

			<!--第1帧-->
            <div class="brand">
                <div class="col-md-8 main">
                <div class="listbox left-box">
                   <ul class="e2">
                @if(!empty($articleList))
					@foreach($articleList as $key=>$article)
                    <li>  <a href="{{$article['arc_link']}}" class='preview'><img src="{{$article['thumbNail']}}"/></a>
                     [<b><a href="{{url('/article/list/'.$article['category_id'])}}">{{$article['name']}}</a></b>] <a href="{{url('/article/detail/'.$article['id'])}}" class="title">{{$article['title']}}</a> <span class="info"> <small>日期：</small>{{$article['created_at']}} <small>点击：</small>{{$article['hits']}} </span>
                     <p class="intro"> {{$article['description']}} </p>
                    </li>
					@endforeach
                @else
                    <li style="text-align:center">暂无文章数据</li>
                @endif
                   </ul>
                 </div>
                @include('pc.common.pager')
                </div>
				<!--右侧内容--> <div class="col-md-4">

                <div class="sellers">
                            <h3 class="m_2">文章栏目</h3>
                            @foreach($sameCategory as $key=>$category)
                            <div class="best">
                            <h4><a href='{{$category["typeLink"]}}'>{{$category['name']}}</a></h4>
                            </div>
                            @endforeach

               </div>
                <div class="sellers">
                            <h3 class="m_2">推荐文章</h3>
                            @foreach($recommend as $key=>$article)
                                <div class="best">
                            <h4><a href="{{url('/article/detail/'.$article['id'])}}">{{$article['title']}}</a></h4>
                            </div>
                            @endforeach
               </div>
               <div class="sellers">
                            <h3 class="m_2">热点文章</h3>
                            @foreach($hots as $key=>$article)
                                <div class="best">
                            <h4><a href="{{url('/article/detail/'.$article['id'])}}">{{$article['title']}}</a></h4>
                            </div>
                            @endforeach
               </div>
                </div>
<div class="clearfix"></div>
            </div>


            <div class="brand">

            </div>
</div>
@endsection
