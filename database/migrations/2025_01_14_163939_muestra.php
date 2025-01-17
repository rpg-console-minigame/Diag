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
        Schema::create('muestra', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('formato_muestra_id');
            $table->foreign('formato_muestra_id')->references('id')->on('formato_muestra');
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id')->references('id')->on('sede');
            $table->unsignedBigInteger('tipo_naturaleza_id');
            $table->foreign('tipo_naturaleza_id')->references('id')->on('tipo_naturaleza');
            $table->unsignedBigInteger('calidad_id');
            $table->foreign('calidad_id')->references('id')->on('calidad');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('muestra');
    }
};
