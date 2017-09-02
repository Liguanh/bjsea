<?php
/**
 * Created by PhpStorm.
 * User: lgh-dev
 * Date: 16/10/27
 * Time: 下午2:33
 */
namespace App\Models;

class UsersModel extends CommonScopeModel
{
    public $timestamps = false;
    //
    protected $table = 'users';

    /**
     * @desc 获取会员信息列表
     * @param $limit
     * @param $where array
     * @return array
     */
    public static function getMember($limit=5, $where = [] )
    {
        return self::select('mtype', 'real_name', 'user_number')
            ->join('user_info', 'users.id', '=','user_info.user_id')
            ->where($where)
            ->limit($limit)
            ->orderBy('users.id', 'desc')
            ->get()
            ->toArray();
    }
}
