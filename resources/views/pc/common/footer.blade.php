<?php
$friendLink = App\Models\FriendLinkModel::getFriendLink();
?>
<div class="footer">
    <div class="container">
        <div class="flink">
            <ul class="f5">
            @foreach($friendLink as $key=>$value)
                <li><a href="{{$value['url']}}" target="_blank">{{$value['url_name']}}</a></li>
            @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="copy-rights">
            <p>{{env('WEB_POWBRBY')}}  {{env('WEB_BEIAN_BAK')}}</p>
        </div>
    </div>
</div>
