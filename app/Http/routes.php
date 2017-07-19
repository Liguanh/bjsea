<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
//    return redirect('/admin/login');
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['api_auth'], 'namespace' => 'Api', 'prefix' => 'api'], function () {

    //查询用户信息
    Route::post('getUserInfo', 'LoanUserController@getUserInfo');
    //批量添加债权及借款人
    Route::post('batchCreateUserAndCredit', 'LoanUserController@batchCreateUserAndCredit');
    //发布项目债权
    Route::post('doPublishCredit', 'LoanUserController@doPublishCredit');
    //还款通知
    Route::post('doRefundNotice', 'LoanUserController@doRefundNotice');
    //满标放款
    Route::post('makeLoans', 'LoanUserController@makeLoans');



});



