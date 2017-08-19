@extends('layouts.admin-app')

@section('content')
    <div class="pageheader" style="height:60px;">
        {!! Breadcrumbs::render('admin-article-category-edit') !!}
    </div>

    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">添加栏目</h4>
                <p><code>点击下方立即保存,请谨慎使用!</code></p>
            </div>
            <div class="panel-body panel-body-nopadding" style="display: block;">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}!</strong>
                        @endforeach
                    </div>
                @endif

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
                <form class="form-horizontal form-bordered" action="/admin/article/category/doEdit" method="post">
                    <input type="hidden" name="id" value="{{ $data['id'] or null }}"/>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">所属栏目</label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm mb15" name="parent_id">
                                <option value="0">根目录</option>
                                @if($category)
                                    @foreach($category as $key=>$value)
                                        <option value="{{$value['id']}}" @if($value['id']==$data['parent_id']) selected @endif>{{$value['name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">栏目名称</label>
                        <div class="col-sm-3">
                            <input type="text" name="name" value="{{ $data['name'] or null }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否链接</label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm mb5" name="is_url" id="is_url">
                                <option value="0" @if($data['is_url']==0) selected @endif>否</option>
                                <option value="1" @if($data['is_url']==1) selected @endif>是</option>
                            </select> <code>若是链接请务必填写正确的链接地址</code>
                        </div>
                    </div>
                    <div class="form-group" id="url">
                        <label class="col-sm-1 control-label">链接地址<span class="asterisk">*</span> </label>
                        <div class="col-sm-3">
                            <input type="text" name="http_url" value="{{ $data['http_url'] or null }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">排序</label>
                        <div class="col-sm-3">
                            <input type="text" name="sort_num" value="{{ $data['sort_num'] or null }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">备注</label>
                        <div class="col-sm-3">
                            <input type="text" name="note" value="{{ $data['note'] or null }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">状态</label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm mb15" name="status">
                                @if($status)
                                    @foreach($status as $key=>$value)
                                        <option value="{{$key}}" @if($key==$data['status']) selected @endif>{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否隐藏</label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm mb5" name="is_hidden" id="is_hidden">
                                @if($hide)
                                    @foreach($hide as $key=>$value)
                                        <option value="{{$key}}" @if($key==$data['is_hidden']) selected @endif>{{$value}}</option>
                                    @endforeach
                                @endif
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
