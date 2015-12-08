<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('becario_id')->unsigned();
            $table->string('universidad');
            $table->string('carrera');
            $table->enum('tipo', ['Pública', 'Privada']);
            $table->enum('status', ['Estudiando', 'Título en proceso','Terminado']);
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
        Schema::drop('academicas');
    }
}
