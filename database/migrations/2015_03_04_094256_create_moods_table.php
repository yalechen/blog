<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 心情表
        Schema::create('moods', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 父级ID
            $table->unsignedInteger('parent_id', false);

            // 文字内容
            $table->string('content');

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
        Schema::drop('moods');
    }
}
