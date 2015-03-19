<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 标签表[当新增博文时记录每个用户的标签]
        Schema::create('tags', function (Blueprint $table)
        {
            // 主键ID
            $table->increments('id');

            // 所属用户
            $table->unsignedInteger('user_id', false)->index();

            // 标签名称
            $table->string('name');

            // 权重[当博文的标签被添加一次，权重+1]
            $table->unsignedInteger('weight')->default(1);

            // 唯一索引
            $table->unique([
                'user_id',
                'name'
            ]);

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
        Schema::drop('tags');
    }
}
