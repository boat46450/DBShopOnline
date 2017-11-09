<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('detail');
            $table->string('pic');
            $table->integer('price');
            $table->integer('limit');
            $table->integer('brandCatalogId')->unsigned();
            $table->integer('shopId')->unsigned();
            $table->timestamps();

            $table->foreign('brandCatalogId')->references('id')->on('brandCatalogs');
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
        Schema::dropIfExists('products');
    }
}
