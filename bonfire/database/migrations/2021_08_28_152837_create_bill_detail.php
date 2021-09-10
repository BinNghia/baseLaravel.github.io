<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill')->default('0')->unsigned();
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->integer('id_product')->default('0')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
            $table->integer('quantity');
            $table->double('unit_price');
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
        Schema::drop('bill_detail');
    }
}
