<?php
/**
 * created By Vim
 * User: Lean-hui
 * Date: 2017/07/19
 * Time: 14:20Pm
 * Desc: PC端路由管理
 */

Route::group(['middleware'=>['web'], 'namespace'=>'Pc', 'prefix'=>'/'], function(){
    Route::auth();

    Route::get('/', 'HomeController@index');//网站首页


    //文章相关
    Route::get('article/list/{cid}', 'Article\ArticleController@getArticleList');//文章列表
    Route::get('article/detail/{id}', 'Article\ArticleController@getArticleDetail');//文章详情
});
