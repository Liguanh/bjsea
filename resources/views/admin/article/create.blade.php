@extends('layouts.admin-app')

@section('content')
    <div class="pageheader" style="height:60px;">
        {!! Breadcrumbs::render('admin-article-create') !!}
    </div>

    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">添加文章</h4>
                <p><code>点击下方立即保存,请谨慎使用!</code></p>
            </div>
            <div class="panel-body panel-body-nopadding" style="display: block;">
                {{--@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}!</strong>
                        @endforeach
                    </div>
                @endif--}}

                @if (session('error'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>{{ session('error') }}!</strong>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <form class="form-horizontal form-bordered" action="/admin/article/doCreate" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="create_by" value="{{Auth::guard('admin')->user()->id}}" class="form-control">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章标题<span class="asterisk">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章缩略图<span class="asterisk">*</span></label>
                        <div class="col-sm-3">
                            <div class="uploader" id="uniform-img">
                                <input type="file" name="little_pic" value="{{ old('little_pic') }}" class="input" value="文件上传">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">所属栏目<span class="asterisk">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm mb15" name="category_id">
                                @if($category)
                                    @foreach($category as $key=>$value)
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">模版布局</label>
                        <div class="col-sm-3">
                            <select name="layout" class="form-control input-sm mb15">
                                @foreach($layout as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">自定义属性</label>
                        <div class="col-sm-5">
                            @foreach($articleFlag as $key => $value)
                                <input type="checkbox" name="flag[]" value="{{$key}}"> {{$value}}({{$key}})&nbsp;
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章作者<span class="asterisk">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="writer" value="酷跑管理员" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章来源<span class="asterisk">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="source" value="{{ env('WEB_TITLE') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group" id="url">
                        <label class="col-sm-1 control-label">点击量 </label>
                        <div class="col-sm-3">
                            <input type="text" name="hits" value="{{ rand(0,100) }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">排序</label>
                        <div class="col-sm-3">
                            <input type="text" name="sort_num" value="0" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否置顶</label>
                        <div class="col-sm-3">
                            <input type="radio" name="is_top" value="0"/> 不置顶&nbsp;&nbsp;&nbsp;<input type="radio" name="is_top" value="1"/> 置顶
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章类型</label>
                        <div class="col-sm-3">
                            <select name="type_id" class="form-control input-sm mb15">
                                @foreach($type as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否推送</label>
                        <div class="col-sm-3">
                            <input type="radio" name="is_push" value="0"/> 否&nbsp;&nbsp;&nbsp;<input type="radio" name="is_push" value="1"/> 是
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章介绍</label>
                        <div class="col-sm-6">
                            <textarea name="intro" class="form-control" >{{old('intro')}} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">关键字搜索</label>
                        <div class="col-sm-6">
                            <input  name="keywords" class="form-control" value="{{old('keywords')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章概述</label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control">{{old('description')}} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">文章内容<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <textarea name="content"  id="content" class="form-control" cols="50"> {{old('content')}}</textarea>
                            @include('scripts.endCKEditor',['id'=>'content']) {{--引入CKEditor编辑器相关JS依赖--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">状态</label>
                        <div class="col-sm-3">
                            <select name="status" class="form-control input-sm mb15">
                                @foreach($status as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer" style="display: block;">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" value="保存" class="btn btn-primary">&nbsp;
                                <input type="reset" value="重置" class="btn btn-default">
                            </div>
                        </div>
                    </div><!-- panel-footer -->
                </form>
            </div><!-- panel-body -->
        </div>
    </div>

@stop
@section('jsScript')
    <script type="text/javascript">
        $(document).ready(function(){
            var is_url = $("select[name='is_url']").val();
            urlShow(is_url);

            $("#is_url").change(function(){
                var is_url = $(this).val();
                urlShow(is_url);
            });
            //设置链接地址是否显示
            function urlShow(is_url)
            {
                if (is_url == 0){
                    $("#url").hide();
                }else{
                    $("#url").show();
                }
            }
        });
    </script>
@show
