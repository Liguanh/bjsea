<?php
/**
 * Created by PhpStorm.
 * User: gyl-dev
 * Date: 16/11/2
 * Time: 下午12:02
 * Desc: 公共查询条件类
 */

namespace App\Models;

class CommonScopeModel extends BaseModel{

    /**
     * @desc 格式化搜索条件
     * @param array $where
     * @param object $obj
     * @return array
     */
    public static function formatSearchCondition($where=[], $obj)
    {
        $condition = [];

        //isset($where['size']) ? $condition['size'] = $where['size'] : '';
        (isset($where['title']) && !empty($where['title'])) ? $condition['title'] = $where['title'] : '';
        isset($where['status']) ? $condition['status'] = $where['status'] : '';
        isset($where['category_id']) ? $condition['category_id'] = $where['category_id'] : '';

        if (empty($where) || empty($condition)){
            return [];
        }

        return $condition;
    }


}