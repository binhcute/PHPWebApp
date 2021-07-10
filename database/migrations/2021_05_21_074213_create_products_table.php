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
            $table->integer('id_cate')->unsigned()->nullable();
            $table->integer('id_user')->unsigned();
            $table->integer('id_portfolio')->unsigned()->nullable();
            $table->integer('id_color')->unsigned()->nullable();
            $table->string('name');
            $table->string('img');
            $table->string('img_hover');
            $table->string('slide_img')->nullable();
            $table->integer('price');
            $table->string('series')->unique();
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
