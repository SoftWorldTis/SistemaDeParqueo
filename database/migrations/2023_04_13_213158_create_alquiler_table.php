<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function (Blueprint $table) {
            $table->increments('alquilerid');
            $table->decimal('alquilerprecio', 3, 0);
            $table->string('alquilerduracion', 45);
            $table->string('alquilersitio', 45);
            $table->smallInteger('alquilerestadopago');
            $table->date('alquilerfecha')->nullable();
            $table->string('cliente_clienteci', 10)->index('fk_alquiler_cliente1_idx');
            $table->integer('estacionamiento_estacionamientoid')->index('fk_alquiler_estacionamiento1_idx');
            $table->string('alquilercoltipopago', 45);
            $table->char('trial710', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquiler');
    }
}
