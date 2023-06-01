<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_salida', function (Blueprint $table) {
            $table->increments('esid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('estacionamientoid');
            $table->unsignedBigInteger('vehiculoid');
            $table->dateTime('entradatime');
            $table->dateTime('salidatime')->nullable();
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estacionamientoid')->references('estacionamientoid')->on('estacionamiento')->onDelete('cascade');
            $table->foreign('vehiculoid')->references('vehiculoid')->on('vehiculo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrada_salida', function (Blueprint $table) {
            $table->dropForeign(['userid']);
            $table->dropColumn('userid');
            $table->dropForeign(['estacionamientoid']);
            $table->dropColumn('estacionamientoid');
            $table->dropForeign(['vehiculoid']);
            $table->dropColumn('vehiculoid');
        });
        Schema::dropIfExists('entrada_salida');
    }
}
