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
        Schema::create('calidad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('tipo_estudio_id')->unsigned();
            $table->foreign('tipo_estudio_id')->references('id')->on('tipo_estudio');
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
        Schema::dropIfExists('calidad');
    }
};
