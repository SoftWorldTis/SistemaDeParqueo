<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehiculo', function (Blueprint $table) {
            $table->foreign(['cliente_clienteci'], 'fk_auto_cliente1')->references(['clienteci'])->on('cliente');
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
            $table->dropForeign('fk_auto_cliente1');
        });
    }
}
