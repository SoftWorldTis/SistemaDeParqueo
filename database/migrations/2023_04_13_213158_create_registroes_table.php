<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroes', function (Blueprint $table) {
            $table->increments('registroesid');
            $table->string('registroescol', 45)->nullable();
            $table->date('fechaentrada')->nullable();
            $table->date('fechasalida')->nullable();
            $table->time('horaentrada');
            $table->time('horasalida');
            $table->integer('auto_autoid')->index('fk_registroes_auto1_idx');
            $table->integer('guardia_guardiaci')->index('fk_registroes_guardia1_idx');
            $table->integer('estacionamiento_estacionamientoid')->index('fk_registroes_estacionamiento1_idx');
            $table->char('trial740', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroes');
    }
}
