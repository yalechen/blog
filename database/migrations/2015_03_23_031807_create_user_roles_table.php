<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 用户角色表
        Schema::create('user_roles', function (Blueprint $table)
        {
            // 用户与角色的对对多关系
            $table->unsignedInteger('user_id', false);
            $table->unsignedInteger('role_id', false);

            $table->unique(array(
                'user_id',
                'role_id'
            ));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
    }
}
