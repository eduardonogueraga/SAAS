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
        Schema::create('systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('MODO_ALARMA');
            $table->tinyInteger('MODO_SENSIBLE');
            $table->tinyInteger('MODULO_SD');
            $table->tinyInteger('MODULO_RTC');
            $table->tinyInteger('MODULO_BLUETOOTH');
            $table->string('SENSORES_HABLITADOS');
            $table->integer('SMS_HISTORICO')->nullable();
            $table->unsignedBigInteger('TIEMPO_ENCENDIDO');
            $table->dateTime('FECHA_SMS_HITORICO')->nullable();
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
        Schema::dropIfExists('systems');
    }
};