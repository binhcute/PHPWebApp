<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_portfolio', function (Blueprint $table) {
            $table->Increments('port_id');
            $table->integer('user_id');
            $table->string('port_name');
            $table->string('port_origin')->nullable();
            $table->string('port_img');
            $table->text('port_description')->nullable();
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpl_portfolio');
    }
}
