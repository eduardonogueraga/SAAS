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
        Schema::create('detecciones', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('entradas_id');
            $table->foreign('entradas_id')->references('id')->on('entradas');

         //   $table->unsignedBigInteger('sensores_id')->nullable();
          //  $table->foreign('sensores_id')->references('id')->on('sensores');

            $table->unsignedBigInteger('avisos_id')->nullable();
            $table->foreign('avisos_id')->references('id')->on('avisos');

            $table->tinyInteger('intrusismo');
            $table->integer('umbral');
            $table->tinyInteger('restaurado')->default(0);;
            $table->string('modo_deteccion');
            $table->dateTime('fecha');
            $table->softDeletes();
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
        Schema::dropIfExists('detecciones');
    }
};
