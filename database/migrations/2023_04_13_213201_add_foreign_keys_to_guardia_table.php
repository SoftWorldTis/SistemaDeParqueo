<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardia', function (Blueprint $table) {
            $table->foreign(['estacionamiento_estacionamientoid'], 'fk_guardia_estacionamiento1')->references(['estacionamientoid'])->on('estacionamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardia', function (Blueprint $table) {
            $table->dropForeign('fk_guardia_estacionamiento1');
        });
    }
}
