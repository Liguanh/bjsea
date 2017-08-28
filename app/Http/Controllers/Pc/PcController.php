<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 8/20/17
 * Time: 1:21 PM
 */

namespace App\Http\Controllers\Pc;


use App\Http\Controllers\Controller;
use App\Logics\CategoryLogic;
use App\Models\FriendLinkModel;

class PcController extends Controller
{

    public function __construct()
    {
    }

    /**
     * @desc 返回json格式
     * @param $data
     */
    public function returnJson($data)
    {
        exit(json_encode($data));
    }

}
