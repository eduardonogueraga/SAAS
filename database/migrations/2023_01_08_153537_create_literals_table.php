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
        Schema::create('literals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('codigo')->unique();
            $table->string('tabla',50);
            $table->string('tipo',50)->default('Undefined');
            $table->string('literal',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('literals');
    }
};
