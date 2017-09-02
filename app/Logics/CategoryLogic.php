<?php
/**
 * Created by PhpStorm.
 * User: Liguanh
 * Date: 7/22/17
 * Time: 10:10 AM
 */

namespace App\Logics;

use App\Logics\BaseLogic;
use App\Models\CategoryModel;

use Log;


class CategoryLogic extends BaseLogic
{


    public function create($data)
    {

        try {
            $attributes = [
                'parent_id' => $data['parent_id'],
                'name'      => $data['name'],
                'sort_num'  => $data['sort_num'],
                'is_url'    => $data['is_url'],
                'http_url'  => $data['http_url'],
                'note'      => $data['note'],
            ];
            $result = CategoryModel::doAdd($attributes);

        }catch (\Exception $e){

            $return['msg'] = $e->getMessage();

            $return['code'] = $e->getCode();

            Log::error('网站栏目创建失败', $return);

            return self::callError($e->getMessage());
        }
        return self::callSuccess($result);
    }

    /**
     * @desc 网站栏目编辑
     * @param $data
     * @return array
     */
    public function doEdit($data)
    {

        try {
            $attributes = [
                'parent_id' => $data['parent_id'],
                'name'      => $data['name'],
                'sort_num'  => $data['sort_num'],
                'is_url'    => $data['is_url'],
                'http_url'  => $data['http_url'],
                'note'      => $data['note'],
                'is_hidden' => $data['is_hidden'],
                'status'    => $data['status'],
            ];

            $result = CategoryModel::edit($data['id'], $attributes);

        }catch (\Exception $e){

            $return['msg'] = $e->getMessage();

            $return['code'] = $e->getCode();

            Log::error('网站栏目编辑失败', $return);

            return self::callError($e->getMessage());
        }

        return self::callSuccess($result);
    }

    /**
     * @desc 获取栏目列表by上级栏目
     * @param $id
     * @return mixed
     */
    public function getCategoryListPid($id)
    {
        $category = CategoryModel::getCategoryByPid($id);

        $category = $this->formatCategory($category);

        return $category;
    }

    /**
     * @desc 获取栏目的所有列表
     * @return mixed
     */
    public function getCategoryAllList()
    {
        $category = CategoryModel::getCategoryList();

        return $category;
    }

    /**
     * @desc 获取同级栏目分类
     * @param $id 栏目id
     * @return array
     */
    public function getSameLevelCategory($id)
    {
        if (empty($id)){
            return [];
        }

        $category = CategoryModel::getCategoryPid($id);

        $categoryList = $this->getCategoryListPid($category->parent_id);

        return $categoryList;
    }

    /**
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        $res = CategoryModel::del($id);

        if (!$res){
            return self::callError('网站栏目删除失败');
        }
        return self::callSuccess($res);
    }


    /**
     * @desc 获取网站栏目菜单信息
     * @return array
     */
    public function getNavList()
    {
        $nav = [];

        $category = CategoryModel::getNavByPid(0);

        foreach ($category as $key=>$value){
            $nav[$value['id']]['name'] = $value['name'];
            $nav[$value['id']]['is_url'] = $value['is_url'];
            $nav[$value['id']]['http_url'] = $value['http_url'];
            $nav[$value['id']]['typeLink'] = ($value['is_url']) ? url($value['http_url']) : url('/article/list/'.$value['id']);

            $nav[$value['id']]['son_list']=$this->formatCategory(CategoryModel::getNavByPid($value['id']));
        }
        return $nav;
    }


    /**
     * @desc 格式化分类信息
     * @category array
     * @return array
     */
    public function formatCategory($category)
    {
        if (empty($category)){
            return [];
        }

        foreach($category as $key=>$value){
            $category[$key]['typeLink'] = ($value['is_url']) ? url($value['http_url']) : '/article/list/'.$value['id'];
        }

        return $category;
    }

    /**
     * @desc 获取栏目信息的面包屑
     * @param categoryId int
     * @return string
     */
    public function getCategoryBrandCrumb($categoryId, $positionName='')
    {
        $typeInfo =  CategoryModel::getCategoryId($categoryId);

        $positionName = "<a href='".$this->getTypeLink($categoryId)."'>".$typeInfo['name']."</a> > ".$positionName;

        if ($typeInfo['parent_id']!=0){

            $positionName = $this->getCategoryBrandCrumb($typeInfo['parent_id'], $positionName);
        }

        return $positionName;
    }

    /**
     * @desc 获取栏目类型连接
     * @return string
     */
    public function getTypeLink($cid)
    {
        return url('/article/list/'.$cid);
    }

}
