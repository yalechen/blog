<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 博文分类表
        Schema::create('categorys', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 名称
            $table->string('name');

            // 父路径
            $table->string('parent_path')->defalut('');

            // 排序
            $table->integer('sort', false, false)->default(10);

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
        Schema::drop('categorys');
    }
}
