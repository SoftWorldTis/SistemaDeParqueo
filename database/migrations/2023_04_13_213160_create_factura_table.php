<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('facturaid');
            
            $table->unsignedInteger('alquilerid');
            $table->foreign('alquilerid')->references('alquilerid')->on('alquiler');

            $table->date('facturafecha');
            $table->integer('facturatotal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropForeign(['alquilerid']);
            $table->dropColumn('alquilerid');
        });
        
        Schema::dropIfExists('factura');
    }
}
