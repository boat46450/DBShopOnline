<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userShops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('shopId')->unsigned();
            $table->timestamps();

            $table->foreign('customerId')->references('id')->on('customers');
            $table->foreign('shopId')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userShops');
    }
}
