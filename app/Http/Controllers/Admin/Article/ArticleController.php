<?php
/**
 * Created by PhpStorm.
 * User: linguanghui
 * Date: 7/21/17
 * Time: 11:10 AM
 * Desc: 管理后台文章管理
 */

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\BaseController;
use App\Logics\ArticleLogic;
use App\Logics\CategoryLogic;
use App\Models\ArticleModel;
use App\Models\BaseModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Breadcrumbs;
use Validator;
use App\Http\Requests\Admin\Article\ArticleRequest;
use Log;
use App\Tools\UploadFile;

class ArticleController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        Breadcrumbs::setView('admin._partials.breadcrumbs');

        Breadcrumbs::register('admin-article', function ($breadcrumbs) {
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('文章管理', route('admin.article'));
        });

    }

    /**
     * @desc 文章列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articleLogic = new ArticleLogic();
        $categoryLogic  = new CategoryLogic();
        Breadcrumbs::register('admin-article-list', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('文章列表', route('admin.article'));
        });

        $where = $request->all();

        $data['search_form'] = $where;

        $where['size'] = 20;

        //获取网站栏目
        $data['category'] = $categoryLogic->getCategoryAllList();
        $data['status'] = BaseModel::setStatusName();

        $data['list'] = $articleLogic->getAdminArticleList($where)['data'];

        return view('admin.article.list', $data);
    }

    /**
     * @desc 创建文章页面
     */
    public function create()
    {
        Breadcrumbs::register('admin-article-create', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('添加文章', route('admin.article.create'));
        });

        $category = CategoryModel::getCategoryList();
        $articleFlag = ArticleModel::setArticleFlag();
        $articleLayout = ArticleModel::setArticleLayout();
        $status = BaseModel::setStatusName();
        $articleType = ArticleModel::setArticleType();

        $attributes = [
            'category' => $category,
            'articleFlag' => $articleFlag,
            'layout'    => $articleLayout,
            'status'    => $status,
            'type'      => $articleType,
        ];
        return view('admin.article.create', $attributes);
    }

    /**
     * @desc 执行文章创建
     */
    public function doCreate(ArticleRequest $request)
    {
        $data = $request->all();

        $articleLogic = new ArticleLogic();

        if ($request->file('little_pic')){
            $result = UploadFile::UploadFile($data['little_pic']);

            if ($result['status']){
                $data['file'] = $result['data']['path'].$result['data']['name'];
            }
        }

        $result = $articleLogic->doCreate($data);

        if (!$result['status']){
            return redirect()->back()->withInput($request->input())->with('error', $result['msg']);
        }else{
            return redirect('/admin/article')->with('message','文章创建成功');
        }
    }

    /**
     * @desc 文章编辑页面
     * @param int $id
     */
    public function edit($id)
    {
        Breadcrumbs::register('admin-article-edit', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('编辑文章', route('admin.article.edit'));
        });

        $articleLogic = new ArticleLogic();

        $return = $articleLogic->getArticleInfo($id);

        if (!$return['status']){
            return redirect('/admin/article')->with('message', $return['msg']);
        }

        $category = CategoryModel::getCategoryList();
        $articleFlag = ArticleModel::setArticleFlag();
        $articleLayout = ArticleModel::setArticleLayout();
        $status = BaseModel::setStatusName();
        $articleType = ArticleModel::setArticleType();

        $attributes = [
            'category' => $category,
            'articleFlag' => $articleFlag,
            'layout'    => $articleLayout,
            'status'    => $status,
            'type'      => $articleType,
            'article'   => $return['data'][0],
            ];
        return view('admin.article.edit', $attributes);
    }

    /**
     * @desc 执行编辑文章的操作
     * @param ArticleRequest $request
     * @return url
     */
    public function doEdit(ArticleRequest $request)
    {
        $data = $request->all();

        $articleLogic = new ArticleLogic();

        if ($request->file('little_pic')){
            $result = UploadFile::UploadFile($data['little_pic']);

            if ($result['status']){
                $data['file'] = $result['data']['path'].$result['data']['name'];
            }
        }else{
            $data['file'] = $data['file_url'];
        }

        $result = $articleLogic->doEdit($data);

        if (!$result['status']){
            return redirect()->back()->withInput($request->input())->with('error', $result['msg']);
        }else{
            return redirect('/admin/article')->with('message','文章编辑成功');
        }
    }

    /**
     * @desc delete the article from url
     */
    public function delete($id)
    {
        $articleLogic = new ArticleLogic();

        $result = $articleLogic->delete($id);

        return $this->ajaxJson($result);
    }
}
