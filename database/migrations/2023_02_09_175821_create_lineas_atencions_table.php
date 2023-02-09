<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_atencions', function (Blueprint $table) {
            $table->id();
            $table->integer('entidad_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('linea')->nullable();
            $table->string('opcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas_atencions');
    }
};
