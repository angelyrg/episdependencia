<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('tipo', 20); //Informe Parcial, Informe Final
            $table->string('archivo');
            
            $table->string('estado', 20)->nullable(); //Por revisar, Observado, Aceptado, Enviado, Publicado,
            
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();
            
            //$table->string('estado_asesor', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado
            //$table->string('estado_coasesor', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado

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
        Schema::dropIfExists('informes');
    }
}
