<?php
/**
 * Created by PhpStorm.
 * User: gyl-dev
 * Date: 16/10/27
 * Time: 下午2:33
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Lang\LangModel;

class BaseModel extends Model{

    public static $defaultNameSpace = ExceptionCodeModel::EXP_MODEL_BASE;

    public static $codeArr = [
        'doAdd'   => 1,
        'edit'     => 2,
        'del'      => 3,
    ];

    const
        STATUS_NO_ACTIVE = 100,//状态未激活
        STATUS_ACTIVE    = 200,//状态已激活
        PAGE_SIZE        = 10,//分页
        IS_SHOW          = 1,//显示
        IS_HIDDEN        = 2,//隐藏
        END = true;

    /**
     * 白名单控制
     * @param array $attributes
     * @param array $fillable
     */
    public function __construct(array $attributes = [], array $fillable = []){

        // 子模型白名单
        if($fillable !== null)
            $this->fillable($fillable);
        // sql日志打印
        app('db')->connection()->enableQueryLog();

        parent::__construct($attributes);
    }

    protected static function getFinalCode($errorText='')
    {

        $codeExt = isset(static::$codeArr[$errorText]) ? static::$codeArr[$errorText] : 0;

        if (isset(static::$expNameSpace)) {

            return static::$expNameSpace + $codeExt;

        } else {

            return self::$defaultNameSpace;

        }

    }

    /**
     * @desc 创建信息
     * @param array $attributes
     * @return mixed
     * @throws \Exception
     */
    public static function doAdd($attributes)
    {

        //$model = self::updateOrCreate(['id'=>null], $attributes);
        $model = new static($attributes, array_keys($attributes));

        $model->save();

        if (!$model){
            throw new \Exception(LangModel::getLang('ERROR_COMMON'), self::getFinalCode('doAdd'));
        }

        return $model->id;
    }

    /**
     * @desc 编辑信息
     * @param int $id
     * @param array $data
     * @param $column string
     * @return mixed
     * @throws \Exception
     */
    public static function edit($id, $data, $column='id')
    {
        $res = self::where($column, $id)->update($data);

        return $res;
    }

    /**
     * @desc 删除信息
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function del($id, $column='id')
    {
        $res = self::where($column, $id)->delete();

        return $res;
    }

    /**
     * @desc 设置状态信息
     * @param string $status
     * @return array|string
     */
    public static function setStatusName($status = '')
    {
        $statusArr =  [
            self::STATUS_NO_ACTIVE => '未发布',
            self::STATUS_ACTIVE    => '已发布',
        ];

        if (empty($status)){
            return $statusArr;
        }
        return isset($statusArr[$status]) ? $statusArr[$status] : '未定义';
    }

}
