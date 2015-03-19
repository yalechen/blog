<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Article;

class CreateArticlesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 博文表
        Schema::create('articles', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 所属用户
            $table->unsignedInteger('user_id', false)->index();

            // 发表月份
            $table->unsignedInteger('pmonth', false)->index();

            // 标题
            $table->string('title');

            // 内容
            $table->text('content');

            // 所属分类
            $table->unsignedInteger('category_id');

            // 是否置顶
            $table->enum('is_hot', [
                Article::HOT_YES,
                Article::HOT_NO
            ])->default(Article::HOT_NO);

            // 是否公开显示
            $table->enum('is_public', [
                Article::PUBLIC_YES,
                Article::PUBLIC_NO
            ])->default(Article::PUBLIC_NO);

            // 赞数
            $table->integer('like_count', false, false)->default(0);

            // 评论数
            $table->integer('comment_count', false, false)->default(0);

            // 浏览数
            $table->integer('view_count', false, false)->default(0);

            $table->softDeletes();
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
        Schema::drop('articles');
    }
}
