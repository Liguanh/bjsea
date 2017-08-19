<?php
/**
 * Created by PhpStorm.
 * User: Lean
 * Date: 7/23/17
 * Time: 9:21 PM
 * Desc: 文章模版
 */

namespace App\Models;


class ArticleModel extends CommonScopeModel
{

    public $timestamps = false;
    //
    protected $table = 'article';


    /**
     * @desc 获取管理后台文章列表
     * @param array $data
     * @return mixed
     */
    public static function getAdminArticleList($data = [])
    {

        $obj = self::select('article.id','article.title','article.updated_at','article.category_id','article.hits','article.writer','category.name','article.status')
            ->join('category','article.category_id','=','category.id');
        //获取格式化条件
        $obj = self::formatSearchArticle($data, $obj);

        return $obj->orderBy('id', 'desc')
            ->paginate($data['size']);
    }

    /**
     * @desc 格式化搜索条件
     * @param $where
     * @param $obj
     * @return mixed
     */
    public static function formatSearchArticle($where, $obj)
    {

        if (isset($where['title']) || !empty($where['title'])){
            $obj = $obj->where('title', 'like', '%'.$where['title'].'%');
        }

        if (isset($where['status']) && !empty($where['status'])){
            $obj = $obj->where('article.status', $where['status']);
        }

        if (isset($where['category_id']) && !empty($where['category_id'])){
            $obj = $obj->where('category_id', $where['category_id']);
        }

        return $obj;
    }

    /**
     * @desc 获取文章的详情
     * @param int $id
     * @return obj mixed
     */
    public static function getArticleInfo($id){

        $articleInfo = self::select('article.*', 'article_extends.a_id', 'article_extends.intro', 'article_extends.keywords', 'article_extends.description', 'article_extends.content')
            ->join('article_extends','article.id','=','article_extends.a_id')
            ->where('article.id', $id)
            ->get()
            ->toArray();

        return $articleInfo;
    }

    /**
     * @desc 获取文章的自定义属性
     * @return array
     */
    public static function setArticleFlag()
    {

        return [
            'h' => '头条',
            'c' => '推荐',
            'f' => '幻灯',
            'a' => '特荐',
            's' => '滚动',
            'b' => '加粗',
            'p' => '图片',
            'j' => '跳转'
        ];
    }

    /**
     * @desc set文章模版布局
     * @return array
     */
    public static function setArticleLayout()
    {
        return [
            'article' => '文章',
            'help' => '帮助',
            'default' => '默认模版'
        ];

    }

    /**
     * @desc 设置文章类型
     * @return array
     */
    public static function setArticleType()
    {
        return [
            1 => 'app媒体资讯',
            2 => '文章资讯',
        ];
    }
}
