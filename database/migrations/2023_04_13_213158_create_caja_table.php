<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja', function (Blueprint $table) {
            $table->increments('cajaid');
            $table->string('cajafecha', 45)->nullable();
            $table->integer('estacionamiento_estacionamientoid')->index('fk_ingreso_estacionamiento1_idx');
            $table->decimal('cajamonto', 5, 0);
            $table->char('trial717', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caja');
    }
}
