<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('username', 20)->comment('账号');
            $table->string('password', 60);
            $table->char('real_name', 15)->default('')->comment('姓名');
            $table->char('email', 50)->unique()->comment('邮箱');
            $table->char('phone', 20)->comment('手机号');
            $table->char('mtype', 20)->default('个人')->comment('会员类型');
            $table->char('identity_card', 25)->defalut('')->comment('身份证号');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
