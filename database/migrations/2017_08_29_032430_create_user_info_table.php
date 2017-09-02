<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0)->comment('用户的user_id');
            $table->char('user_number',30)->default('')->comment('用户的会员号');
            $table->enum('sex', ['男','女',''])->default('')->comment('性别');
            $table->string('address', 20)->nullable()->default('')->comment('联系地址');
            $table->string('operator', 20)->nullable()->default('')->comment('负责人法人');
            $table->text('user_description')->nullable()->default('')->comment('会员介绍');
            $table->string('member_level',20)->default('')->comment('会员等级');
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
        Schema::drop('user_info');
    }
}
