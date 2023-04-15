<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardia', function (Blueprint $table) {
            $table->integer('guardiaci')->primary();
            $table->string('guardianombre', 45);
            $table->time('guardiahoraentrada');
            $table->time('guardiahorasalida');
            $table->string('guardiacorreo', 45);
            $table->date('guardiafechanacimiento');
            $table->integer('estacionamiento_estacionamientoid')->index('fk_guardia_estacionamiento1_idx');
            $table->char('trial733', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardia');
    }
}
