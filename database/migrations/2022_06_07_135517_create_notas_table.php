<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnota', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('est_id');
            $table->foreign('est_id', 'fk_estudiante_nota')->references('id')->on('tblestudiante')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('mtr_id');
            $table->foreign('mtr_id', 'fk_matricula_nota')->references('id')->on('tblmatricula')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('asg_id');
            $table->foreign('asg_id', 'fk_asignatura_nota')->references('id')->on('tblasignatura')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('prfni_id');
            $table->foreign('prfni_id', 'fk_prfnivel_nota')->references('id')->on('tblprofesornivel')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('ani_id');
            $table->foreign('ani_id', 'fk_aniacademico_nota')->references('id')->on('tblanioacademico')->onDelete('cascade')->onUpdate('restrict');
            $table->string('nivel');
            $table->string('aula');
            $table->string('trimestre');
            $table->decimal('nota1', 10, 2);
            $table->decimal('nota2', 10, 2);
            $table->decimal('nota3', 10, 2);
            $table->decimal('nota4', 10, 2);
            $table->decimal('nota5', 10, 2);
            $table->decimal('resul1', 10, 2);
            $table->decimal('resul2', 10, 2);
            $table->decimal('resul3', 10, 2);
            $table->decimal('final1', 10, 2);
            $table->decimal('final2', 10, 2);
            $table->decimal('final3', 10, 2);
            $table->decimal('notafinal', 10, 2);
            $table->enum('aprobo', ['S', 'N']);
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
        Schema::dropIfExists('tblnota');
    }
}
