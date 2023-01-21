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
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('activa')->default(0);
            $table->tinyInteger('notificaciones')->default(0);
            $table->tinyInteger('max_intentos')->default(2);
            $table->tinyInteger('intentos_realizados')->default(0);
            $table->tinyInteger('periodo')->default(10);
            $table->dateTime('ultima_ejecucion')->nullable();
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
        Schema::dropIfExists('alarms');
    }
};
