<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alquiler', function (Blueprint $table) {
            $table->foreign(['cliente_clienteci'], 'fk_alquiler_cliente1')->references(['clienteci'])->on('cliente');
            $table->foreign(['estacionamiento_estacionamientoid'], 'fk_alquiler_estacionamiento1')->references(['estacionamientoid'])->on('estacionamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alquiler', function (Blueprint $table) {
            $table->dropForeign('fk_alquiler_cliente1');
            $table->dropForeign('fk_alquiler_estacionamiento1');
        });
    }
}
