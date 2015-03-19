<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    //评论表
		Schema::create('comments', function(Blueprint $table)
		{
		    //主键ID
			$table->increments('id');

			//所属文章
			$table->unsignedInteger('article_id',false);

			//评论内容
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
		Schema::drop('comments');
	}

}
