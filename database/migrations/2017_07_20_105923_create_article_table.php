<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('文章表');
            $table->char('title',200)->comment('文章名称');
            $table->char('little_pic',100)->comment('文章缩略图片');
            $table->integer('category_id')->comment('类别 category.id');
            $table->char('layout', 50)->comment('模板布局');
            $table->char('flag',20)->defalut('')->comment('文章标示,头条，轮播等等');
            $table->char('writer',20)->default('')->comment('作者');
            $table->char('source',20)->default('')->comment('来源');
            $table->integer('hits')->default(0)->comment('点击量');
            $table->integer('sort_num')->comment('排序');
            $table->tinyInteger('is_top')->comment('是否置顶')->default(0);
            $table->tinyInteger('type_id')->comment('1-app媒体资讯，2-文章资讯')->default(1);
            $table->tinyInteger('is_push')->comment('是否推送')->default(0);
            $table->smallInteger('status')->comment('状态 100 未发布, 200 已发布');
            $table->char('create_by',10)->default('')->comment('创建人');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
    }
}
