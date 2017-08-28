<?php

namespace App\Http\Controllers\Pc;

use App\Http\Requests;
use App\Logics\CategoryLogic;
use App\Logics\ArticleLogic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends PcController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleLogic = new ArticleLogic();
        $user = $this->getUserId();

        //幻灯
        $slide = $articleLogic->getArticleByFlag('f');
        //头条
        $top = $articleLogic->getArticleByFlag('h',11);
        $attributes = [
            'slide'  => $slide,
            'top'    => $top,
        ];

        return view('pc.index', $attributes);
    }
}
