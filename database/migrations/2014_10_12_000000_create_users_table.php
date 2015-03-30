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
        // 用户表
        Schema::create('users', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 用户名,即博客名
            $table->string('name');

            // 用户昵称，显示使用
            $table->string('nickname');

            // 邮箱
            $table->string('email')->unique();

            // 密码
            $table->string('password', 60);

            // 手机号
            $table->string('mobile', 15)->default('');

            // 真实姓名
            $table->string('real_name')->default('');

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

            // 上一次登录时间
            $table->timestamp('prev_login_time')->nullable();

            // 最后登录时间
            $table->timestamp('last_login_time')->nullable();

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
