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
        Schema::create('tpl_article', function (Blueprint $table) {
            $table->Increments('article_id');
            $table->integer('user_id');
            $table->string('article_name');
            $table->string('article_img');
            $table->text('article_description');
            $table->string('article_keyword')->nullable();
            $table->timestamps();
            $table->integer('status');
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
        Schema::dropIfExists('tpl_article');
    }
}
