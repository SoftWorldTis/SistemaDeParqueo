<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('roleid');
            $table->foreign('roleid')->references('id')->on('roles');
            $table->unsignedBigInteger('permissionid');
            $table->foreign('permissionid')->references('id')->on('permissions');
            $table->string('change', 30)->nullable();
            $table->dateTime('updated')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions_histories');
    }
}
