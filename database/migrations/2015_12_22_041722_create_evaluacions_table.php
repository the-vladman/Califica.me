<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('becario_id')->unsigned();
            $table->date('start');
            $table->date('end');
            $table->boolean('activa');
            $table->string('asistencia');
            $table->string('extras');
            $table->float('eficiencia');
            //Datos a evaluar
            $table->integer('constancia');
            $table->integer('puntualidad');
            $table->integer('colaboracion');
            $table->integer('proactividad');
            $table->integer('ensenanza');
            $table->integer('popularidad');
            //Bandera
            $table->integer('me_evaluo');
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
        Schema::drop('evaluacions');
    }
}
