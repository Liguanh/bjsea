 <div >
   <ul class="pagination">
    @if($pager['current_page']>1)
        <li><a href="{{$pager['prev_page_url']}}">上一页</a></li>
    @endif
    @foreach($pager['view'] as $key=>$page)
      @if($pager['current_page'] == $page)
        <li class='active'><a>{{$page}}</a></li>
      @else
        <li><a href="{{ $pager['page_url'].$page }}">{{$page}}</a></li>
      @endif
    @endforeach
    @if($pager['current_page'] < $pager['last_page'])
        <li><a href="{{$pager['next_page_url']}}">下一页</a></li>
    @endif
   </ul>
  </div>
