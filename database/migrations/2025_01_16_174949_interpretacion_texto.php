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
        Schema::create('interpretacion_texto', function (Blueprint $table) {
            $table->id();
            $table->string('texto');
            $table->unsignedBigInteger('id_muestra');
            $table->foreign('id_muestra')->references('id')->on('muestra');
            $table->unsignedBigInteger('id_interpretacion');
            $table->foreign('id_interpretacion')->references('id')->on('interpretacion');
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
        Schema::dropIfExists('interpretacion_texto');
    }
};
