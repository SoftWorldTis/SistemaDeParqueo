<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstacionamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamiento', function (Blueprint $table) {
            $table->increments('estacionamientoid');
            $table->string('estacionamientocorreo', 50);
            $table->string('estacionamientozona', 40);
            $table->time('estacionamientohorainicio');
            $table->time('estacionamientohoracierre');
            $table->integer('estacionamientositios');
            $table->decimal('estacionamientoprecio', 3, 0);
            $table->decimal('estacionamientotelefono', 9, 0);
            $table->string('estacionamientoestado', 10)->nullable();
            $table->string('estacionamientoimagen', 50);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamiento');
    }
}
