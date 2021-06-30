<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('name');
            $table->string('img');
            $table->text('detail');
            $table->string('keyword')->nullable();
            $table->timestamps();
            $table->string('properties')->nullable();
            $table->integer('status')->default('1');
            $table->integer('view')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
