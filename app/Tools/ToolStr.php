<?php
/**
 * Created by PhpStorm.
 * User: gyl-dev
 * Date: 16/6/16
 * Time: 上午9:36
 * Desc: 字符串相关的操作
 */

namespace App\Tools;

class ToolStr
{

    /**
     * @param $phone
     * @param int $before
     * @param int $last
     * @return string
     * @desc 处理隐藏手机号
     * @todo $showHide=4, $showType='*' 可以再增加更强大的功能（隐藏几位，隐藏数字用什么符号代替）
     */
    public static function hidePhone($phone, $before = 3, $last = 2)
    {

        $begin = substr($phone, 0, $before);

        $last = substr($phone, -$last);

        return $begin . '****' . $last;

    }

    /**
     * @param $str
     * @param $length
     * @param $hideStr
     * @return string
     * @desc 处理长字符串，如地址，超出长度以外的字符用*代替
     */
    public static function hideStr($str,$length = 20, $hideStr='***')
    {
        $str = self::html2text($str);
        $strlen = mb_strlen($str, 'utf-8');
        $str = $strlen < $length ? $str : str_replace(mb_substr($str,$length),$hideStr,$str);
        return $str;
    }

    /**
     * @param string $type
     * @param int $length
     * @param string $customStr
     * @param string $splitChar
     * @param int $splitLength
     * @return string
     * @desc 生成随机字符串
     */
    public static function getRandStr($length = 32, $type = 'number-lower-upper', $customStr = '', $splitChar = '', $splitLength = 4)
    {
        $strArr = array(
            'number' => '0123456789',
            'lower' => 'abcdefghijklmnopqrstuvwxyz',
            'upper' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'special' => '~!@#$%^&*()_+{}|[]\-=:<>?/',
        );
        $defaultType = 'number-lower-upper';

        if ($type == 'all') {        //全部
            $str = implode('', $strArr);
        } else if ($type == 'custom') {        //自定义类型
            if (empty($customStr)) {    //未填写自定义类型，则默认为数字+大小写字母
                $type = $defaultType;
            } else {
                $str = $customStr;
            }
        }

        //custom 没带自定义类型 或 其他类型
        if (empty($str)) {
            $typeParts = array_intersect(array_keys($strArr), (array)explode('-', $type));
            if (empty($typeParts)) {
                $typeParts = explode('-', $defaultType);
            }
            $str = '';
            foreach ($typeParts as $part) {
                $str .= $strArr[$part];
            }
        }

        // 大数据下面str_shuffle会导致随机种子耗尽而导致结果循环（错误做法）
        // $passwordStr    = '';
        // do {
        // $randStr        = str_shuffle($str);
        // $passwordStr   .= substr($randStr, 0, 1);        //每次取一个字符
        // $passwordLength = strlen($passwordStr);
        // } while($passwordLength < $length);

        //纠正
        $passwordStr = '';
        $strMaxIndex = strlen($str) - 1;
        do {
            $randIndex = mt_rand(0, $strMaxIndex);
            $passwordStr .= $str[$randIndex];        //每次取一个字符
            $passwordLength = strlen($passwordStr);
        } while ($passwordLength < $length);

        //需要分隔
        if ($splitChar != '') {
            $passwordStr = implode($splitChar, str_split($passwordStr, $splitLength));
        }

        return $passwordStr;
    }

    /**
     * @return string
     * @desc 获取随机票据id
     */
    public static function getRandTicket(){

        return date('YmdHis').rand(100000,999999);

    }

    /**
     * @desc 自定义的html代码过滤函数
     * @param string $str
     * @return string
     */
	public static function html2text($str){
		$str = preg_replace("/<style .*?<\/style>/is", "", $str);
		$str = preg_replace("/<script .*?<\/script>/is", "", $str);
		$str = preg_replace("/<br \s*\/?\/>/i", "\n", $str);
		$str = preg_replace("/<\/?p>/i", "\n\n", $str);
		$str = preg_replace("/<\/?td>/i", "\n", $str);
		$str = preg_replace("/<\/?div>/i", "\n", $str);
		$str = preg_replace("/<\/?blockquote>/i", "\n", $str);
		$str = preg_replace("/<\/?li>/i", "\n", $str);
		$str = preg_replace("/\&nbsp\;/i", " ", $str);
		$str = preg_replace("/\&nbsp/i", " ", $str);
		$str = preg_replace("/\&amp\;/i", "&", $str);
		$str = preg_replace("/\&amp/i", "&", $str);
		$str = preg_replace("/\&lt\;/i", "<", $str);
		$str = preg_replace("/\&lt/i", "<", $str);
		$str = preg_replace("/\&ldquo\;/i", '"', $str);
		$str = preg_replace("/\&ldquo/i", '"', $str);
		$str = preg_replace("/\&lsquo\;/i", "'", $str);
		$str = preg_replace("/\&lsquo/i", "'", $str);
		$str = preg_replace("/\&rsquo\;/i", "'", $str);
		$str = preg_replace("/\&rsquo/i", "'", $str);
		$str = preg_replace("/\&gt\;/i", ">", $str);
		$str = preg_replace("/\&gt/i", ">", $str);
		$str = preg_replace("/\&rdquo\;/i", '"', $str);
		$str = preg_replace("/\&rdquo/i", '"', $str);
		$str = strip_tags($str);
		$str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
		$str = preg_replace("/\&\#.*?\;/i", "", $str);
		return $str;
	}
}
