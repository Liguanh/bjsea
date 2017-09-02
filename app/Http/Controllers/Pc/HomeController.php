<?php

namespace App\Http\Controllers\Pc;

use App\Http\Requests;
use App\Logics\CategoryLogic;
use App\Logics\ArticleLogic;
use App\Logics\UsersLogic;
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
        $usersLogic = new UsersLogic();
        $user = $this->getUserId();

        //幻灯
        $slide = $articleLogic->getArticleByFlag('f');
        //头条
        $top = $articleLogic->getArticleByFlag('h',11);
        //首页内容
        $top = $articleLogic->getArticleByFlag('h',11);

        //文章简述
        $desc = $articleLogic->getArticleInfo(1)['data'];
        //赛事信息
        $match = $articleLogic->getArticleByCategoryIds([20], 7);

        //最新会员信息
        $newMember = $usersLogic->getNewMemberList(5);

        //培训消息
        $train = $articleLogic->getArticleByCategoryIds([24], 7);
        $attributes = [
            'slide'  => $slide,
            'top'    => $top,
            'desc'   => $desc['0'],
            'match'  => $match,
            'members'=> $newMember,
            'train'  => $train,
        ];

        return view('pc.index', $attributes);
    }
}
