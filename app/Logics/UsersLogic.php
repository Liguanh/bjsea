<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 8/28/17
 * Time: 4:29 PM
 * Desc: 创建用户的逻辑层的类
 */

namespace App\Logics;

use App\Models\UsersModel;
use Log;

class UsersLogic extends BaseLogic
{
    /**
     * @desc 获取最新的会员列表
     * @param $limit
     * @return array
     */
    public function getNewMemberList($limit)
    {
        $userList = UsersModel::getMember($limit);

        return $userList;
    }


}
