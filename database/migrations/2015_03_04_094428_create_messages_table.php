<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 留言表
        Schema::create('messages', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 所属用户
            $table->unsignedInteger('user_id', false)->index();

            // 留言者email
            $table->string('email');

            // 内容
            $table->string('content');

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
        Schema::drop('messages');
    }
}
