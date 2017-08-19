@extends('layouts.admin-app')

@section('content')
    <div class="pageheader" style="height:60px;">
        {!! Breadcrumbs::render('admin-article-category') !!}
    </div>
    <div class="panel panel-default">
        <div class="panel-body panel-body-nopadding" style="display: block;">
                <div class="panel-footer" style="display: block;">
                    <div class="row">
                        <div class="col-sm-6">
                            <a  href="/admin/article/category/create"  class="btn btn-primary">分类添加</a>
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
                        <th>栏目名称</th>
                        <th>状态</th>
                        <th>是否隐藏</th>
                        <th>排序</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    @if(!empty($category))
                        @foreach($category as $key=>$val)
                        <tr>
                            <td>{{$val['id']}}</td>
                            <td>{{$val['name']}}</td>
                            <td>@if($val['status'] == \App\Models\BaseModel::STATUS_NO_ACTIVE) <span class="label label-danger">未发布</span>@else <span class="label label-danger">已发布</span> @endif
                            </td>
                            <td>@if($val['is_hidden'] == \App\Models\BaseModel::IS_SHOW) <span class="label label-danger">显示</span> @else <span class="label label-danger">隐藏</span> @endif </td>
                            <td>{{$val['sort_num']}}</td>
                            <td>{{$val['created_at']}}</td>
                            <td><a href="/admin/article/category/edit/{{$val['id']}}" class="btn btn-danger">编辑</a>
                                &nbsp;&nbsp;<a class="btn btn-danger" href="javascript:void(0)" onclick="if(confirm('确定要删除吗?')){ window.location.href='/admin/article/category/delete/{{$val['id']}}'}">删除</a>
                                &nbsp;&nbsp;<a href="/admin/article/category/list/{{$val['id']}}" class="btn btn-info"><i class="fa fa-info"></i> 查看子栏目</a>
                                &nbsp;&nbsp;<a href="/admin/article?title=&source=&category_id={{$val['id']}}" class="btn btn-info">查看栏目文章</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    <tbody>
                    </tbody>

                </table>

            </div><!-- table-responsive -->
        </div>

    </div><!-- contentpanel -->
@endsection