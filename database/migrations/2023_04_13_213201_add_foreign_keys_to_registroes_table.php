<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegistroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registroes', function (Blueprint $table) {
            $table->foreign(['auto_autoid'], 'fk_registroes_auto1')->references(['vehiculoid'])->on('vehiculo');
            $table->foreign(['estacionamiento_estacionamientoid'], 'fk_registroes_estacionamiento1')->references(['estacionamientoid'])->on('estacionamiento');
            $table->foreign(['guardia_guardiaci'], 'fk_registroes_guardia1')->references(['guardiaci'])->on('guardia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registroes', function (Blueprint $table) {
            $table->dropForeign('fk_registroes_auto1');
            $table->dropForeign('fk_registroes_estacionamiento1');
            $table->dropForeign('fk_registroes_guardia1');
        });
    }
}
