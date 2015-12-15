<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre');
            $table->string('url_logo');
            $table->integer('progreso');
            $table->integer('integrantes');
            $table->integer('max_integrantes');
            $table->text('descripcion');
            $table->enum('tipo', ['CTIN', 'CARSO','Operación CTIN']);
            $table->enum('area', ['software', 'hardware','diseño','social']);
            $table->date('start');
            $table->date('end');
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
        Schema::drop('proyectos');
    }
}
