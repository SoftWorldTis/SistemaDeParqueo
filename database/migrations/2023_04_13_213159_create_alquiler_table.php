<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function (Blueprint $table) {
            $table->increments('alquilerid');

            $table->unsignedInteger('estacionamientoid');
            $table->foreign('estacionamientoid')->references('estacionamientoid')->on('estacionamiento');
           
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
           
            $table->integer('alquilerprecio');
            $table->date('alquilerfecha');
            $table->integer('alquilersitio');
            $table->date('alquilerfechaini');
            $table->date('alquilerfechafin');
            $table->string('alquilertipopago', 45);
            $table->boolean('alquilerestadopago');
            
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
            $table->dropForeign(['userid']);
            $table->dropColumn('userid');
            $table->dropForeign(['estacionamientoid']);
            $table->dropColumn('estacionamientoid');
        });
        Schema::dropIfExists('alquiler');
    }
}
