<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleExtendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_extends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a_id')->comment('文章id')->index();
            $table->text('intro')->comment('介绍');
            $table->char('keywords',80)->comment('关键字');
            $table->char('description',255)->comment('描述');
            $table->text('content')->comment('文章内容');
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
        Schema::drop('article_extends');
    }
}
