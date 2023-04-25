<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReclamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclamo', function (Blueprint $table) {
            $table->foreign(['cliente_clienteci'], 'fk_reclamo_cliente1')->references(['clienteci'])->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclamo', function (Blueprint $table) {
            $table->dropForeign('fk_reclamo_cliente1');
        });
    }
}
