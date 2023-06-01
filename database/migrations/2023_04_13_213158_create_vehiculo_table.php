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

            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiculo', function (Blueprint $table) {
            $table->dropForeign(['userid']);
            $table->dropColumn('userid');
        });
        Schema::dropIfExists('vehiculo');
    }
}
