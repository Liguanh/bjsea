@extends('layouts.admin-app')

@section('content')
    <div class="pageheader" style="height:60px;">
        {!! Breadcrumbs::render('admin-article-list') !!}
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">×</a>
                <a href="" class="minimize">−</a>
            </div>
            <h4 class="panel-title">文章搜索</h4>
        </div>
        <div class="panel-body panel-body-nopadding" style="display: block;">

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <form class="form-horizontal form-bordered" method="get" action="/admin/article">

                <div class="form-group">
                    <label class="col-sm-1 control-label">文章标题</label>
                    <div class="col-sm-2">
                        <input type="text" name="title" value="{{ $search_form['title'] or null }}" placeholder="文章标题" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label">网站栏目</label>
                    <div class="col-sm-2">
                        <select name="category_id" class="form-control input-sm mb5">
                            <option value="">默认不选</option>
                            @foreach($category as $key=>$value)
                                <option value="{{$value['id']}}" @if(isset($search_form['category_id']) && $search_form['category_id'] == $value['id']) selected @endif>{{$value['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-sm-1 control-label">文章状态</label>
                    <div class="col-sm-2">
                        <select name="status" class="form-control input-sm mb5">
                            <option value="">默认不选</option>
                            @foreach($status as $key=>$value)
                                <option value="{{$key}}" @if(isset($search_form['status']) && $search_form['status'] == $key) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-footer" style="display: block;">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-1">
                            <input type="submit" value="搜索" class="btn btn-primary">&nbsp;
                            <input type="reset" value="重置" class="btn btn-default">

                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body panel-body-nopadding" style="display: block;">
            <div class="panel-footer" style="display: block;">
                <div class="row">
                    <div class="col-sm-6">
                        <a  href="/admin/article/create"  class="btn btn-primary">添加文章</a>
                    </div>
                </div>
            </div><!-- panel-footer -->
        </div>
    </div>
    <div class="contentpanel">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>文章标题</th>
                        <th>更新时间</th>
                        <th>状态</th>
                        <th>所属栏目</th>
                        <th>点击数</th>
                        <th>发布作者</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($list))
                        @foreach($list as $key=>$value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>{{ \App\Models\BaseModel::setStatusName($value->status) }}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->hits}}</td>
                                <td>{{$value->writer}}</td>
                                <td>
                                    <a href="/admin/article/edit/{{$value->id}}" class="btn btn-white"><i class="fa fa-pencil"></i> 编辑</a>
                                    <a class="btn btn-danger article-delete" data-href="{{ route('admin.article.delete',['id'=>$value->id]) }}" ><i class="fa fa-trash-o"></i> 删除</a>
                                    <a href="{{url('/article/detail/'.$value->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-info"></i> 文章预览</a>
                                </td>
                            </tr>
                            @endforeach
                    @endif
                    </tbody>
                </table>
                {!! $list->render() !!}
            </div><!-- table-responsive -->
        </div>

    </div><!-- contentpanel -->
@endsection
@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">
        $(".article-delete").click(function () {
            Rbac.ajax.delete({
                confirmTitle: '确定删除该文章吗?',
                href: $(this).data('href'),
                successTitle: '文章删除成功'
            });
        });

        $(".deleteall").click(function () {
            Rbac.ajax.deleteAll({
                confirmTitle: '确定删除选中的角色?',
                href: $(this).data('href'),
                successTitle: '角色删除成功'
            });
        });
    </script>

@endsection
