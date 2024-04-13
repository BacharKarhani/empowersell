<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProductsTable extends Migration
{
    public function up()
    {
        Schema::create('users_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('review_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('review_id')->references('review_id')->on('reviews');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_products');
    }
}
