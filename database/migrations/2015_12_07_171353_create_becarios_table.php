<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombres', 80);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50);
            $table->enum('area', ['software', 'hardware','diseño','social']);
            $table->date('fecha_ingreso');
            $table->text('descripcion');
            $table->string('email', 50);
            $table->string('telefono', 10);
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
        Schema::drop('becarios');
    }
}
