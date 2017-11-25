<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('paymentId')->unsigned();
            $table->integer('totalPrice');
            $table->string('houseNum', 10);
            $table->string('street', 30);
            $table->string('subDistrict', 30);
            $table->string('district', 30);
            $table->string('city', 30);
            $table->string('zipcode', 10);
            $table->timestamps();

            $table->foreign('customerId')->references('id')->on('customers');
            $table->foreign('paymentId')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
