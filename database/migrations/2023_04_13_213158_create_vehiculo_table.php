<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('vehiculoid');
            $table->string('vehiculomodelo', 40)->nullable();
            $table->string('vehiculoplaca', 45);
            $table->string('vehiculodescripcion', 45)->nullable();
            $table->string('cliente_clienteci', 10)->index('fk_auto_cliente1_idx');
            $table->char('trial746', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
}
