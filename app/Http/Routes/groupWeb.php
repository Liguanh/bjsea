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
});
