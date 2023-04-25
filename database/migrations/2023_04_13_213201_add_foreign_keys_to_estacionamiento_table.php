<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstacionamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estacionamiento', function (Blueprint $table) {
            $table->foreign(['factura_facturaid'], 'fk_estacionamiento_factura1')->references(['facturaid'])->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estacionamiento', function (Blueprint $table) {
            $table->dropForeign('fk_estacionamiento_factura1');
        });
    }
}
