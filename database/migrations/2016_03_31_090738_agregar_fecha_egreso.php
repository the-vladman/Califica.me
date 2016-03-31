<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFechaEgreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('becarios', function (Blueprint $table) {
            //
            $table->date('fecha_egreso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('becarios', function (Blueprint $table) {
            //
            $table->date('fecha_egreso');
        });
    }
}
