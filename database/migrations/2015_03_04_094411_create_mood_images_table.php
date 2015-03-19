<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 心情图片表
        Schema::create('mood_images', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 所属心情
            $table->unsignedInteger('mood_id', false);

            // 对应图片
            $table->string('image_hash');

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
        Schema::drop('mood_images');
    }
}
