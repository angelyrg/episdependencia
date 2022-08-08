<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->string('modalidad'); //Servicio Social, Extesnión Cultural, Poyección Social
            $table->string('nombre_proyecto');
            $table->text('descripcion');
            $table->string('presupuesto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nombre_grupo');
            $table->string('estado', 20)->default('Inicio'); //Inicio, Parcial, Completado

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

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
        Schema::dropIfExists('proyectos');
    }
}
