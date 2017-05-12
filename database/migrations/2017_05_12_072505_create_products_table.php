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
            $table->string('slug')->unique();
            $table->unsignedInteger('user_id');
            $table->integer('location_id');
            $table->unsignedInteger('category_id');
            $table->integer('price')->default(0);
            $table->string('thumbnail')->nullable()->default(null);
            $table->string('thumbnail_medium')->nullable()->default(null);
            $table->string('thumbnail_small')->nullable()->default(null);
            $table->integer('rating')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
