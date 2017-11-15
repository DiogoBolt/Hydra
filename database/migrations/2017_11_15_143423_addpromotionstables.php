<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addpromotionstables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('begin');
            $table->dateTime('end');
            $table->boolean('active');
            $table->float('percentage');
            $table->text('description');
            $table->timestamps();

        });
        Schema::create('promotions_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promotion_id');
            $table->integer('product_id');
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
        Schema::drop('promotions');
        Schema::drop('promotions_products');
    }
}
