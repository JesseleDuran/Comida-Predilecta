<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->float('subtotal', 8, 2)->unsigned();
            $table->float('iva', 8, 2)->unsigned();
            $table->float('total', 8, 2)->unsigned();
            $table->string('forma_pago');
            $table->boolean('llevar');
            $table->integer('numero_mesa');
            $table->integer('ci_cliente');
            $table->integer('ci_user');

            $table->foreign('numero_mesa')->references('numero')->on('mesa');
            $table->foreign('ci_cliente')->references('cedula')->on('cliente');
            $table->foreign('ci_user')->references('cedula')->on('user');

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
        Schema::dropIfExists('venta');
    }
}
