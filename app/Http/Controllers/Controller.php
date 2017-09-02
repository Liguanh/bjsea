<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->viewShare();
    }

    public function getUserId()
    {
        return \Auth::guard('web')->user();
    }

    /**
     * @desc 设置视图共享数据
     */
    public function viewShare()
    {
        //网站栏目
        $categoryLogic = new \App\Logics\CategoryLogic();
        $category = $categoryLogic->getNavList();
        view()->share('nav', $category);
    }
}
