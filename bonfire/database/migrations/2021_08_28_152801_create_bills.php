<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->default('0')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('date_order')->default('0000-00-00');
            $table->float('total')->default('0');
            $table->string('payment',200)->default('NULL');
            $table->string('note',500)->default('NULL');
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
        //
        Schema::drop('bills');
    }
}
