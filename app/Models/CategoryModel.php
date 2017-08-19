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
     * @desc 获取网站栏目by父ID
     * @param $pid
     * @return mixed
     */
    public static function getCategoryPid($pid)
    {

        $return = self::select('id','parent_id','name','status','is_hidden','sort_num','created_at')
            ->where('parent_id', $pid)
            ->orderBy('sort_num', 'asc')
            ->get()
            ->toArray();

        return $return;
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
