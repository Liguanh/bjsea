<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 7/21/17
 * Time: 11:10 AM
 * Desc: 前台文章管理
 */

namespace App\Http\Controllers\Pc\Article;

use App\Http\Controllers\Pc\PcController;
use App\Logics\ArticleLogic;
use App\Logics\CategoryLogic;
use App\Tools\ToolPaginate;
use Illuminate\Http\Request;

class ArticleController extends PcController
{

    /**
     * @desc 获取文章列表前台显示
     * @param Request $request
     * @param $cid int
     * @return array
     */
    public function getArticleList(Request $request, $cid)
    {
        $page = $request->input('page', 1);
        $size = 5;
        $articleLogic = new ArticleLogic();
        $categoryLogic = new CategoryLogic();

        $articleList = $articleLogic->getArticleListByCid($cid, $size);

        //文章栏目
        $sameCategory = $categoryLogic->getSameLevelCategory($cid);

        //推荐文章
        $recommend = $articleLogic->getArticleByFlag('c', 6);

        //热点文章
        $hots = $articleLogic->getHotArticle(6);

        $total = $articleList['total'];

        //分页处理
        $page = new ToolPaginate($total, $page, $size, url('/article/list/'.$cid));

        $pager = $page->getPagerInfo();

        //面包屑
        $position = $categoryLogic->getCategoryBrandCrumb($cid);

        $attributes  =[
            'articleList' => $articleList['data'],
            'position'    => $position,
            'sameCategory'    => $sameCategory,
            'recommend'   => $recommend,
            'hots'        => $hots,
            'pager'      => $pager,
            ];
        return view('pc.article.list', $attributes);
    }


    /**
     * @desc 文章详情页面查看前台页面
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function getArticleDetail(Request $request, $id)
    {
        $articleLogic = new ArticleLogic();
        $categoryLogic = new CategoryLogic();

        //增加文章的访问次数
        $result = $articleLogic->addArticleHits($id);
        if (!$result['status']){
            echo $result['msg'];
        }

        //获取文章内容
        $articleInfo = $articleLogic->getArticleInfo($id);

        if ($articleInfo['status'] == false){
            exit($articleInfo['msg']);
        }

        //面包屑
        $cid = $articleInfo['data'][0]['category_id'];
        $position = $categoryLogic->getCategoryBrandCrumb($cid, $articleInfo['data'][0]['title']);

        $attributes = [
            'article'  => $articleInfo['data'][0],
            'position' => $position,
            ];
        return view('pc.article.detail', $attributes);
    }
}
