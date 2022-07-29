<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmatricula', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('est_id')->nullable();
            $table->foreign('est_id', 'fk_estudiante_matricula')->references('id')->on('tblestudiante')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('asg_id')->nullable();
            $table->foreign('asg_id', 'fk_asignatura_matricula')->references('id')->on('tblasignatura')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('mes_id')->nullable();
            $table->foreign('mes_id', 'fk_mes_matricula')->references('id')->on('tblmes')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('ani_id')->nullable();
            $table->foreign('ani_id', 'fk_aniacademico_matricula')->references('id')->on('tblanioacademico')->onDelete('cascade')->onUpdate('restrict');
            /* $table->unsignedInteger('aul_id')->nullable();
            $table->foreign('aul_id', 'fk_aula_matricula')->references('id')->on('tblaula')->onDelete('cascade')->onUpdate('restrict'); */
            $table->integer('mtr_estado')->default(0);
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
        Schema::dropIfExists('tblmatricula');
    }
}
