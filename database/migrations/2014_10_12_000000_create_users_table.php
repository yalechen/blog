<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// 用户表
        Schema::create('users', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 用户名,即博客名
            $table->string('name');

            // 邮箱
            $table->string('email')->unique();

            // 密码
            $table->string('password', 60);

            // 手机号
            $table->string('mobile', 15)->default('');

            // 头像
            $table->string('avatar_hash')->default('');

            // 省份ID
            $table->unsignedInteger('province_id')->default(0);

            // 城市ID
            $table->unsignedInteger('city_id')->default(0);

            // 省分城市全称
            $table->string('region_name')->default('');

            // 签名
            $table->string('signature')->default('');

            // 博文数量
            $table->unsignedInteger('article_count', false)->default(0);

            // 心情数量
            $table->unsignedInteger('mood_count', false)->default(0);

            $table->rememberToken();
            $table->timestamps();
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
