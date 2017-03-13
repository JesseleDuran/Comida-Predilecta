<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComidaComida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida_comida', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_comida')->unsigned();
            $table->integer('id_comida1')->unsigned();
            $table->integer('cantidad')->unsigned();

            $table->foreign('id_comida')->references('id')->on('comida');
            $table->foreign('id_comida1')->references('id')->on('comida')->onDelete('cascade');

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
        Schema::dropIfExists('comida_comida');
    }
}
