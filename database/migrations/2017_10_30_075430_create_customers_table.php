<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('name', 30);
            $table->string('surname', 40);
            $table->string('houseNum', 10);
            $table->string('street', 30);
            $table->string('subDistrict', 30);
            $table->string('district', 30);
            $table->string('city', 30);
            $table->string('zipcode', 10);
            $table->string('tel', 20);
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
        Schema::dropIfExists('customers');
    }
}
