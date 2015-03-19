<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 文章标签表
        Schema::create('article_tags', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 博文ID
            $table->unsignedInteger('article_id', false);

            // 文章的标签ID
            $table->unsignedInteger('tag_id', false);

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
        Schema::drop('article_tags');
    }
}
