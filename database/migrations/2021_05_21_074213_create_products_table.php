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
            $table->Increments('id');
            $table->unsignedInteger('id_cate');
            $table->string('name');
            $table->string('img');
            $table->integer('price');
            $table->string('color')->nullable();
            $table->text('detail')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('keyword')->nullable();
            $table->string('properties')->nullable();
            $table->integer('status')->default('1');
            $table->integer('view')->nullable();
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
        Schema::dropIfExists('products');
    }
}
