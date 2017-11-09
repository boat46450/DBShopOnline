<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brandCatalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catalogId')->unsigned();
            $table->integer('brandId')->unsigned();
            $table->timestamps();

            $table->foreign('catalogId')->references('id')->on('catalogs');
            $table->foreign('brandId')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brandCatalogs');
    }
}
