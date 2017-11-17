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
            $table->integer('shippingId')->unsigned();
            $table->integer('totalPrice')->nullable();
            $table->string('houseNum');
            $table->string('street');
            $table->string('subDistrict');
            $table->string('district');
            $table->string('city');
            $table->string('zipcode');
            $table->timestamps();

            $table->foreign('customerId')->references('id')->on('customers');
            $table->foreign('paymentId')->references('id')->on('payments');
            $table->foreign('shippingId')->references('id')->on('shippings');
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
