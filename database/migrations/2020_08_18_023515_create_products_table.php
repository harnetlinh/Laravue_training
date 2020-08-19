<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('product_id')->autoIncrement();
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->string('product_name');
            $table->string('desc');
            $table->string('price');
            $table->string('made_in')->nullable();
            $table->string('sugar_percent')->nullable();
            $table->string('material')->nullable();
            $table->binary('img');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
           // $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('type_id')->references('type_id')->on('product_types');
            $table->foreign('store_id')->references('store_id')->on('stores');
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
