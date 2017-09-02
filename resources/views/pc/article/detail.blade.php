@extends('pc.common.layout')
@section('content')
<div class='content'>

<!--面包屑-->
	  <div class="dreamcrub">
			  <div class="container">
				 <ul class="breadcrumbs">
					<li class="home">
					   <a href="{{url('/')}}" title="Go to Home Page"><img src="{{asset('bjesa/images/home.png')}}" alt=""/></a>&nbsp;
					</li>
					   <a href="{{url('/')}}" title="Go to Home Page">首页 ></a>
						{!! $position !!}
					</li>
				 </ul>
				<div class="clearfix"></div>
			   </div>
		 </div>
 		<div class="container">
        <!--第1帧-->
            <div class="brand">
                <!--<div class="col-md-8 main">-->
                <div class="viewbox left-box">
  			    	<div class="title">  <h2>{{$article['title']}}</h2> </div>
  				    <!-- /title -->
  					<div class="infos"> <small>时间:</small>{{$article['created_at']}}<small>来源:</small>{{$article['source']}} <small>作者:</small>{{$article['writer']}} <small>点击:</small>{{$article['hits']}} 次</div>
  					<!-- /info -->
                    @if(!empty(trim($article['description'])))
					  <div class="intro left-box">{!! $article['description']!!}</div>
                    @endif
  				<div class="content">
				   <table width='100%'>
					<tr>
					 <td>
                        {!! $article['content']!!}
					  (责任编辑：{{$article['writer']}})</td>
					</tr>
				   </table>
 				 </div>
  				<!-- /content -->
				 </div>
                <div class="clearfix"></div>
            </div>


        </div>
        </div>
</div>
@endsection
