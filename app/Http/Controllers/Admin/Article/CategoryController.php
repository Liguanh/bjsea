<?php
/**
 * create by PhpStorm
 * User: Liguanh
 * Date: 2017/07/22
 * Desc: 文章分类管理
 */

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\BaseController;
use App\Logics\CategoryLogic;
use App\Models\BaseModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Breadcrumbs;

class CategoryController extends BaseController
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
    //
    /**
     * @desc 栏目列表
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id=0)
    {
        Breadcrumbs::register('admin-article-category', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('文章栏目', route('admin.article.category.list'));
        });

        $categoryLogic = new CategoryLogic();

        $category = $categoryLogic->getCategoryListPid($id);

        $data = [
            'category' => $category,
        ];
        return view('admin.category.list', $data);
    }

    /**
     * @desc 创建文章分类页面
     */
    public function create()
    {
        Breadcrumbs::register('admin-article-category-create', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('添加栏目', route('admin.article.category.create'));
        });

        $category = CategoryModel::getCategoryList();

        $attributes = [
            'category' => $category,
        ];
        return view('admin.category.create', $attributes);
    }

    /**
     * @desc 执行文章分类创建
     */
    public function doCreate(Request $request)
    {
        $data = $request->all();

        $categoryLogic = new CategoryLogic();
        $result = $categoryLogic->create($data);

        if ($result['status']){
            return redirect('/admin/article/category/list')->with('message','网站栏目创建成功');
        }else{
            return redirect()->back()->withInput($request->input())->with('error',$result['msg']);
        }

    }

    /**
     * @desc 文章分类编辑页面
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        Breadcrumbs::register('admin-article-category-edit', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-article');
            $breadcrumbs->push('编辑栏目', route('admin.article.category.edit'));
        });

        $categoryInfo = CategoryModel::getCategoryId($id);

        $category = CategoryModel::getCategoryList();

        $status = BaseModel::setStatusName();

        $hide   = CategoryModel::setHiddenAttr();


        $attributes = [
            'data' => $categoryInfo,
            'category'=> $category,
            'status'  => $status,
            'hide'    => $hide,
        ];
        return view('admin.category.edit', $attributes);
    }

    /**
     * @desc 栏目编辑
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doEdit(Request $request)
    {
        $data = $request->all();

        $categoryLogic = new CategoryLogic();
        $result = $categoryLogic->doEdit($data);

        if ($result['status']){
            return redirect('/admin/article/category/list')->with('message','网站栏目更新成功');
        }else{
            return redirect()->back()->withInput($request->input())->with('error',$result['msg']);
        }
    }

    /**
     * @desc 删除栏目
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $categoryLogic = new CategoryLogic();

        $result = $categoryLogic->delete($id);

        if ($result['status']){
            return redirect('/admin/article/category/list')->with('message','网站栏目删除成功');
        }
    }
}
