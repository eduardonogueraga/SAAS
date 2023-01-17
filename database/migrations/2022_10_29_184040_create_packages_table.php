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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contenido_peticion',5000)->nullable();
            $table->tinyInteger('intentos')->default(1);
            $table->tinyInteger('implantado')->default(0);
            $table->string('respuesta_http',100)->nullable();
            $table->string('error',1000)->nullable();
            $table->string('saa_version', 50)->default("Undefined");
            $table->dateTime('fecha');
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
        Schema::dropIfExists('packages');
    }
};
