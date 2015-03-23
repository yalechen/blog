<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePurviewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 角色权限表
        Schema::create('role_purviews', function (Blueprint $table)
        {
            $table->unsignedInteger('role_id', false);
            $table->unsignedInteger('purview_id', false);

            $table->unique(array(
                'role_id',
                'purview_id'
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
        Schema::drop('role_purviews');
    }
}
