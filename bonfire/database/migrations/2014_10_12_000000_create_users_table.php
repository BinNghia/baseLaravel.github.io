<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name',255);
            $table->string('name',50);
            $table->string('address',100);
            $table->string('phone_number',15);
            $table->date('birth');
            $table->tinyInteger('gender')->default('0');
            $table->integer('idGroup');
            $table->string('email',255)->unique();
            $table->string('password', 255);
            $table->string('note',200)->default('NULL');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
