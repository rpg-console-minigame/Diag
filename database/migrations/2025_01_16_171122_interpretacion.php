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
        Schema::create('interpretacion', function (Blueprint $table) {
            $table->id();
            $table->string('texto');
            $table->unsignedBigInteger('tipo_estudio_id');
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
        //
    }
};
