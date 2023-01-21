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
            $table->string('contenido_peticion',5000);
            $table->string('respuesta_http',300);
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
