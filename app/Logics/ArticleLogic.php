<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 7/24/17
 * Time: 6:29 PM
 * Desc: 创建文章的逻辑层的类
 */

namespace App\Logics;

use App\Models\ArticleModel;
use App\Models\ArticleExtendModel;
use App\Tools\ToolArray;
use Log;

class ArticleLogic extends BaseLogic
{

    /**
     * @desc 获取文章列表[管理后台]
     * @param $data
     * @return array
     */
    public function getAdminArticleList($data)
    {
        try {

            $articleList = ArticleModel::getAdminArticleList($data);

        }catch(\Exception $e){
            return self::callError($e->getMessage());
        }

        return self::callSuccess($articleList);
    }

    /**
     * @desc 获取文章详情
     * @param int $id
     * @return array
     */
    public function getArticleInfo($id)
    {
        if (empty($id)){
            return self::callError('文章ID为空');
        }

        $articleInfo = ArticleModel::getArticleInfo($id);

        if (empty($articleInfo)){
            return self::callError('文章详情获取失败或文章不存在');
        }
        return self::callSuccess($articleInfo);
    }

    /**
     * @desc 执行创建信息
     * @param $data array
     */
    public function doCreate($data)
    {
        if (empty($data)){
            return self::callError('提交数据为空');
        }

        try {
            self::beginTransaction();

            //格式化数据
            $attributes = $this->_filterParams($data);

            //添加文章信息到主表
            $aid = ArticleModel::doAdd($attributes['article']);
            //添加信息到扩展表
            $attributes['extend']['a_id'] = $aid;
            ArticleExtendModel::doAdd($attributes['extend']);
            self::commit();
        }catch(\Exception $e) {
            self::rollback();

            $return['msg'] = $e->getMessage();

            $return['code'] = $e->getCode();

            Log::error('文章创建失败', $return);

            return self::callError($e->getMessage());
        }

        return self::callSuccess($attributes, '文章创建成功');
    }

    /**
     * @desc 执行文章编辑操作
     * @param array $data
     * @return array
     */
    public function doEdit($data)
    {
        if (empty($data)){
            return self::callError('提交数据为空');
        }

        try {
            self::beginTransaction();

            //格式化数据
            $attributes = $this->_filterParams($data);

            //编辑文章信息到主表
            $aid = ArticleModel::edit($data['id'], $attributes['article']);

            //编辑信息到扩展表
            ArticleExtendModel::edit($data['id'], $attributes['extend'], 'a_id');
            self::commit();
        }catch(\Exception $e) {
            self::rollback();

            $return['msg'] = $e->getMessage();

            $return['code'] = $e->getCode();

            Log::error('文章创建失败', $return);

            return self::callError($e->getMessage());
        }

        return self::callSuccess($attributes, '文章创建成功');

    }

    /**
     * @desc 管理后台文章删除功能
     * @param $id int
     * @return array
     */
    public function delete($id)
    {
        try {
            self::beginTransaction();
            //删除主表内容
            ArticleModel::del($id);

            //删除拓展表记录
            ArticleExtendModel::del($id, 'a_id');

            self::commit();
        }catch(\Exception $e){
            self::rollback();

            $return['msg'] = $e->getMessage();

            $return['code'] = $e->getCode();

            Log::error('文章创建失败', $return);

            return self::callError($e->getMessage());
        }
        return self::callSuccess($id, '文章删除成功');
    }

    /**
     * @desc 格式化数据
     * @param $data array
     * @return return array
     */
    public function _filterParams($data)
    {

        $attributes['article'] = [
            'title'         => trim($data['title']),
            'little_pic'    => !empty($data['file']) ? $data['file']: '',
            'category_id'   => (int)$data['category_id'],
            'layout'        => trim($data['layout']),
            'flag'          => !empty($data['flag']) ? $this->_formatFlag($data['flag']) : '',
            'writer'        => trim($data['writer']),
            'source'        => trim($data['source']),
            'hits'          => (int)$data['hits'],
            'sort_num'      => !empty((int)$data['sort_num']) ? (int)$data['sort_num'] : 0,
            'is_top'        => !empty($data['is_top']) ? (int)$data['is_top']:0,
            'type_id'       => !empty($data['type_id']) ? (int)$data['type_id'] : 0,
            'is_push'       => !empty($data['is_push']) ? (int)$data['is_push'] : 0,
            'status'        => (int)$data['status'],
            'create_by'     => trim($data['create_by']),
        ];

        $attributes['extend'] = [

            'intro'         => !empty($data['intro']) ? htmlspecialchars(trim($data['intro'])) : '',
            'keywords'      => !empty(trim($data['keywords'])) ? trim($data['keywords']):'',
            'description'   => !empty(trim($data['description'])) ? trim($data['description']) : '',
            'content'       => htmlspecialchars(trim($data['content'])),
            ];

        return $attributes;
    }

    /**
     * @desc 格式化文章属性
     * $param $flag array|str
     * @return array|str
     */
    public function _formatFlag($flag)
    {
        if(empty($flag)){
            return '';
        }
        if (!is_array($flag)){
            return $flag;
        }

        $flag = ToolArray::arrayToStr($flag);

        return $flag;
    }
}