<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Breadcrumbs;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');

        Breadcrumbs::register('dashboard', function ($breadcrumbs) {
            $breadcrumbs->push('首页', route('admin.home'));
        });
    }

    /**
     * @return mixed
     * @desc 获取管理员id
     */
    public function getAdminId(){

        return \Auth::guard('admin')->user()->id;

    }

    /**
     * @desc ajax 返回json格式
     * @param $data array
     * @return string
     */
    public function ajaxJson($data)
    {
        exit(json_encode($data));
    }

}
