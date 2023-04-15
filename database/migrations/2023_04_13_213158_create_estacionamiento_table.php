<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstacionamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamiento', function (Blueprint $table) {
            $table->increments('estacionamientoid');
            $table->string('estacionamientoubicacion', 50);
            $table->string('estacionamientozona', 40);
            $table->string('estacionamientohorarios', 20);
            $table->integer('estacionamientositios');
            $table->decimal('estacionamientoprecio', 3, 0);
            $table->string('estacionamientoestado', 10)->nullable();
            $table->integer('factura_facturaid')->index('fk_estacionamiento_factura1_idx');
            $table->char('trial723', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamiento');
    }
}
