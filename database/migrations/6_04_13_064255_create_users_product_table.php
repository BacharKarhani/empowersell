<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProductTable extends Migration
{
    public function up()
    {
        Schema::create('users_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('review_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->timestamps(); // Adds created_at and updated_at columns

        });
    }

    public function down()
    {
        Schema::dropIfExists('users_product');
    }
}
