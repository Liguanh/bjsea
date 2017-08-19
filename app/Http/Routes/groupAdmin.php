<?php
/**
 * created By Vim
 * User: Lean-hui
 * Date: 2017/07/19
 * Time: 14:20Pm
 * Desc: 管理后台路由管理
 */

Route::group(['middleware'=>['web'], 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::auth();

    Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
    Route::resource('admin_user', 'AdminUserController');
    Route::post('admin_user/store', 'AdminUserController@store');
    Route::post('admin_user/destroyall',['as'=>'admin.admin_user.destroy.all','uses'=>'AdminUserController@destroyAll']);
    Route::resource('role', 'RoleController');
    Route::post('role/destroyall',['as'=>'admin.role.destroy.all','uses'=>'RoleController@destroyAll']);
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');
    Route::post('permission/destroyall',['as'=>'admin.permission.destroy.all','uses'=>'PermissionController@destroyAll']);
    Route::resource('blog', 'BlogController');

//    网站栏目相关路由
    Route::get('article/category/list/{pid?}',['as'=>'admin.article.category.list', 'uses'=>'Article\CategoryController@index']);
    Route::get('article/category/create',['as'=>'admin.article.category.create', 'uses'=>'Article\CategoryController@create']);
    Route::post('article/category/doCreate',['as'=>'admin.article.category.doCreate', 'uses'=>'Article\CategoryController@doCreate']);
    Route::get('article/category/edit/{id?}',['as'=>'admin.article.category.edit', 'uses'=>'Article\CategoryController@edit']);
    Route::post('article/category/doEdit',['as'=>'admin.article.category.doEdit', 'uses'=>'Article\CategoryController@doEdit']);
    Route::get('article/category/delete/{id}',['as'=>'admin.article.category.delete', 'uses'=>'Article\CategoryController@delete']);

//    the Routes about articles
    Route::get('article',['as'=>'admin.article', 'uses'=>'Article\ArticleController@index']);
    Route::get('article/create',['as'=>'admin.article.create', 'uses'=>'Article\ArticleController@create']);
    Route::post('article/doCreate',['as'=>'admin.article.doCreate', 'uses'=>'Article\ArticleController@doCreate']);
    Route::get('article/edit/{id?}',['as'=>'admin.article.edit', 'uses'=>'Article\ArticleController@edit']);
    Route::post('article/doEdit',['as'=>'admin.article.doEdit', 'uses'=>'Article\ArticleController@doEdit']);
    Route::any('article/delete/{id}',['as'=>'admin.article.delete', 'uses'=>'Article\ArticleController@delete']);


    //编辑器信息
    Route::post('editor/image/upload', ['as'=>'admin.editor.image.upload', 'uses'=>'UploadController@editorImageUpload']);

});
