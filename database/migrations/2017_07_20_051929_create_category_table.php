<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id')->comment('文章分类表');
            $table->integer('parent_id')->default(0)->comment('父分类ID');
            $table->char('name',30)->default('')->comment('文章分类名称');
            $table->smallInteger('sort_num')->default(0)->comment('排序');
            $table->smallInteger('status')->default(100)->comment('状态 100:未发布, 200:已发布');
            $table->smallInteger('is_hidden')->default(1)->comment('是否隐藏: 1:显示 2:隐藏');
            $table->char('note',100)->default('')->comment('信息备注');
            $table->smallInteger('is_url')->default(0)->comment('是否链接');
            $table->char('http_url',30)->default('')->comment('栏目链接');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
