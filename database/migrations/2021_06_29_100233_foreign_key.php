<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('id_cate')
            ->references('id') -> on('product_categories')
            ->onDelete('cascade');
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
            $table->foreign('id_portfolio')
            ->references('id') -> on('portfolios')
            ->onDelete('cascade');
            $table->foreign('id_color')
            ->references('id') -> on('colors')
            ->onDelete('cascade');
        });
        Schema::table('product_categories', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
        });Schema::table('portfolios', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
        });
        Schema::table('colors', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('id_product')
            ->references('id') -> on('products')
            ->onDelete('cascade');
            $table->foreign('id_article')
            ->references('id') -> on('articles')
            ->onDelete('cascade');
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('id_order')
            ->references('id') -> on('orders')
            ->onDelete('cascade');
            $table->foreign('id_product')
            ->references('id') -> on('products')
            ->onDelete('cascade');
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id') -> on('users')
            ->onDelete('cascade');
            $table->foreign('id_product')
            ->references('id') -> on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
    }
}
