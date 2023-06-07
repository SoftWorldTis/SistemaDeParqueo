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
            $table->Bigincrements('esid');
            $table->unsignedInteger('alquilerid');
            $table->unsignedBigInteger('vehiculoid');
            $table->dateTime('entradatime');
            $table->dateTime('salidatime')->nullable();

            $table->foreign('alquilerid')->references('alquilerid')->on('alquiler')->onDelete('cascade');
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
            $table->dropForeign(['alquilerid']);
            $table->dropColumn('alquilerid');
            $table->dropForeign(['vehiculoid']);
            $table->dropColumn('vehiculoid');
        });
        Schema::dropIfExists('entrada_salida');
    }
}
