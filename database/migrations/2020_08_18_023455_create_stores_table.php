<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id')->autoIncrement();
            $table->string('name');
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
           // $table->timestamps();
        });

        Schema::table('stores', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('type_id')->on('product_types');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
