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
        Schema::create('applogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->string('desc',200)->default('Entrada de datos');
            $table->string('contenido_peticion',5000)->nullable();
            $table->string('respuesta_http',300)->nullable();
            $table->string('error',1000)->nullable();
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
        Schema::dropIfExists('applogs');
    }
};
