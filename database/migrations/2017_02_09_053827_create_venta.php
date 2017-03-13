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
            $table->float('subtotal', 8, 2)->unsigned();
            $table->float('iva', 8, 2)->unsigned();
            $table->float('total', 8, 2)->unsigned();
            $table->string('forma_pago');
            $table->boolean('llevar');
            $table->integer('numero_mesa')->nullable();
            $table->integer('id_cliente');
            $table->string('ci_user');

            $table->foreign('numero_mesa')->references('id')->on('mesa');
            $table->foreign('id_cliente')->references('id')->on('cliente');
            $table->foreign('ci_user')->references('cedula')->on('users');

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
