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
            $table->unsignedBigInteger('last_package_id')->nullable();
            $table->foreign('last_package_id')->references('id')->on('packages');
            $table->unsignedBigInteger('last_notice_id')->nullable();
            $table->foreign('last_notice_id')->references('id')->on('notices');
            $table->tinyInteger('activa')->default(0);
            $table->tinyInteger('notificaciones')->default(0);
            $table->tinyInteger('max_intentos')->default(2);
            $table->tinyInteger('intentos_realizados')->default(0);
            $table->tinyInteger('periodo')->default(10);
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
