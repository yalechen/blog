<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\News;

class CreateNewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 通知消息表（别人对自己的权限，文章评论，心情评论等变动的通知）
        Schema::create('news', function (Blueprint $table)
        {
            $table->increments('id');

            // 所属用户
            $table->unsignedInteger('user_id', false);

            // 通知内容
            $table->string('content');

            // 消息的连接地址
            $table->string('url');

            // 是否已读
            $table->enum('is_read', [
                News::READ_YES,
                News::READ_NO
            ])->default(News::READ_NO);

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
        Schema::drop('news');
    }
}
