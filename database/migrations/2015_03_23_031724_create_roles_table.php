<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 角色表
        Schema::create('roles', function (Blueprint $table)
        {
            // 权限ID
            $table->increments('id');

            // 角色Key
            $table->string('key')->unique();

            // 角色名
            $table->string('name');

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
        Schema::drop('roles');
    }
}
