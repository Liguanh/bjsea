<?php

namespace App\Models;

use App\Lang\LangModel;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class CategoryModel extends CommonScopeModel
{
    public $timestamps = false;
    //
    protected $table = 'category';

    //protected $fillable = ['id','parent_id','name'];


    /**
     * @desc 获取网站栏目by父ID[管理后台列表]
     * @param $pid
     * @return mixed
     */
    public static function getCategoryByPid($pid)
    {

        $return = self::select('id','parent_id','name','status','is_hidden','sort_num','created_at','is_url','http_url')
            ->where('parent_id', $pid)
            ->orderBy('sort_num', 'asc')
            ->get()
            ->toArray();

        return $return;
    }

    /**
     * @desc 获取网站前台菜单显示
     * @param $pid int
     * @return array
     */
    public static function getNavByPid($pid)
    {
        $return = self::select('id','parent_id','name','status','is_hidden','sort_num','created_at','is_url','http_url')
            ->where('parent_id', $pid)
            ->where('status', self::STATUS_ACTIVE)
            ->where('is_hidden', self::IS_SHOW)
            ->orderBy('sort_num', 'asc')
            ->get()
            ->toArray();

        return $return;
    }

    /**
     * @desc 获取文章栏目的父分类id
     * @param $id
     * @return int
     */
    public static function getCategoryPid($id)
    {
        return self::select('parent_id')
            ->where('id', $id)
            ->first();
    }

    /**
     * @desc 获取网站栏目列表
     * @return mixed
     */
    public static function getCategoryList()
    {
        $return = self::select('id', 'parent_id', 'name')
            ->where('status', self::STATUS_ACTIVE)
            ->get()
            ->toArray();

        return $return;
    }

    /**
     * @desc 获取栏目的信息
     * @param $id
     * @return mixed
     */
    public static function getCategoryId($id)
    {
        $data = self::where('id',$id)
            ->get()
            ->toArray();

        if (!empty($data)){

            return $data[0];
        }
        return [];
    }

    /**
     * @desc 设置隐藏属性
     * @param $key
     * @return string
     */
    public static function setHiddenAttr($key='')
    {

        $hideArr =  [
            self::IS_SHOW    => '显示',
            self::IS_HIDDEN  => '隐藏',
        ];

        if (empty($key)){
            return $hideArr;
        }
        return isset($hideArr[$key]) ? $hideArr[$key] : '未定义';
    }
}
