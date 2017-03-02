<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComidaIngrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida_ingrediente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('id_comida')->unsigned();
            $table->integer('cantidad')->unsigned();

            $table->foreign('id_ingrediente')->references('id')->on('ingrediente')->onDelete('cascade');
            $table->foreign('id_comida')->references('id')->on('comida')->onDelete('cascade');
            
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
        Schema::dropIfExists('comida_ingrediente');
    }
}
