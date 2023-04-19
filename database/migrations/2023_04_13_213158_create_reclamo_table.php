<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamo', function (Blueprint $table) {
            $table->increments('reclamoid');
            $table->text('reclamodecripcion');
            $table->date('reclamofecha');
            $table->string('reclamotitulo', 45);
            $table->string('cliente_clienteci', 10)->index('fk_reclamo_cliente1_idx');
            $table->char('trial737', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamo');
    }
}
