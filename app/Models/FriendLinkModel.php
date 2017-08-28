<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 8/20/17
 * Time: 3:13 PM
 */

namespace App\Models;


class FriendLinkModel extends CommonScopeModel
{
    protected $fillable = [];

    protected $table = 'friend_link';

    /**
     * @desc 获取友情链接的列表
     * @return mixed
     */
    public static function getFriendLink()
    {
        return self::select('url','url_name')
            ->get()
            ->toArray();
    }
}