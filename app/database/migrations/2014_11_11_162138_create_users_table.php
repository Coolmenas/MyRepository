<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
{
    Schema::create('users', function($table)
    {
        $table->increments('id');
        $table->string('email')->unique();
        $table->string('username')->unique();
        $table->string('password');        
        $table->string('name');
        $table->timestamps();
        $table->double('x');
        $table->double('y');
    });
}

public function down()
{
    Schema::drop('users');
}

}
