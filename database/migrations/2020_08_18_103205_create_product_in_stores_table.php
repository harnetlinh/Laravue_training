<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_in_stores', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->primary(['store_id','product_id']);
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_in_stores');
    }
}
