<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 8/16/17
 * Time: 5:40 PM
 */

namespace App\Http\Controllers\Admin;

use App\Tools\UploadFile;
use Config;

use upload;
use Illuminate\Http\Request;

class UploadController extends BaseController
{

    public function editorImageUpload()
    {
       // 获取图片上传配置
        $imageConfig   = Config::get('upload.PICTURE');

        // 实例化上传类
        $handle        = new upload($_FILES['upload'], 'zh_CN');

        // 上传大小过滤
        if($handle->file_src_size > $imageConfig['MAX_SIZE']){
            $result = 'alert("上传文件大小不对'. $imageConfig["MAX_SIZE_DESC"] . '")';
            exit("<script>$result;</script>");
        }

        // 扩展名过滤
        if(!in_array($handle->file_src_name_ext, $imageConfig['TYPE'])){
            $result = 'alert("上传文件格式不对")';
            exit("<script>$result;</script>");
        }

        $ossLogic = new UploadFile();

        $upload   = $ossLogic->uploadFile($_FILES['upload']);

        if ($upload['status']) {
            //$pictureDb       = new PictureDb;
            $subUploadFile   = substr($upload['data']['path'],strpos($upload['data']['path'],'/')+1).'/'.$upload['data']['name'];
            //$pictureId       = $pictureDb->add($subUploadFile);
            $url             = url($upload['data']['path'].'/'.$upload['data']['name']);
            $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
            $message         = '图片上传成功';
            $result          = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')";
            exit("<script>$result;</script>");
        } else {
            $result = 'alert("上传文件失败'. $handle->error . '")';
            exit("<script>$result;</script>");
        }
    }

}
