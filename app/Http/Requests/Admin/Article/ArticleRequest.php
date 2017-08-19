<?php

/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 8/16/17
 * Time: 6:32 PM
 */
namespace App\Http\Requests\Admin\Article;
use App\Http\Requests\Admin\Request;

class ArticleRequest extends Request
{

    public function rules()
    {
        return [
            'title' => 'required',
    //        'little_pic' => 'required|mimes:png,jpeg,jpg',
            'category_id' => 'required',
            'writer' => 'required',
            'source' => 'required',
            'content' => 'required',
        ];
    }

    public function message()
    {
        return [
        ];
    }
}
