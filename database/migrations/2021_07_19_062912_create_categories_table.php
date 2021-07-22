<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_category', function (Blueprint $table) {
            $table->Increments('cate_id');
            $table->integer('user_id');
            $table->string('cate_name');
            $table->string('cate_img')->nullable();
            $table->text('cate_description')->nullable();
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
        Schema::dropIfExists('tpl_category');
    }
}
