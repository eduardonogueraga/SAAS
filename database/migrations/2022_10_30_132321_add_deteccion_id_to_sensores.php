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
        Schema::table('sensores', function (Blueprint $table) {
            $table->unsignedBigInteger('deteccion_id')->nullable()->after('id');
            $table->foreign('deteccion_id')->references('id')->on('detecciones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensores', function (Blueprint $table) {
            $table->dropForeign(['deteccion_id']);
            $table->dropColumn('deteccion_id');
        });
    }
};
