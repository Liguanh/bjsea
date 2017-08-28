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
        $category = CategoryModel::getCategoryPid($id);

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

        $category = CategoryModel::getCategoryPid(0);

        foreach ($category as $key=>$value){
            $nav[$value['id']]['name'] = $value['name'];

            $nav[$value['id']]['son_list']=CategoryModel::getCategoryPid($value['id']);
        }
        return $nav;
    }


}