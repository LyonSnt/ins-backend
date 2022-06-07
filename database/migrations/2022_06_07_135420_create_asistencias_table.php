<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblasistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mtr_id');
            $table->foreign('mtr_id', 'fk_matricula_asistencia')->references('id')->on('tblmatricula')->onDelete('cascade')->onUpdate('restrict');
            $table->enum('asi_presente', ['S', 'N']);
            $table->date('asi_fecha');
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
        Schema::dropIfExists('tblasistencia');
    }
}
