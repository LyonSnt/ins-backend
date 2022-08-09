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
            $table->unsignedInteger('est_id')->nullable();
            $table->foreign('est_id', 'fk_estudiante_nota')->references('id')->on('tblestudiante')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('mtr_id')->nullable();
            $table->foreign('mtr_id', 'fk_matricula_nota')->references('id')->on('tblmatricula')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('asg_id')->nullable();
            $table->foreign('asg_id', 'fk_asignatura_nota')->references('id')->on('tblasignatura')->onDelete('cascade')->onUpdate('restrict');
           /*  $table->unsignedInteger('prfni_id')->nullable();
            $table->foreign('prfni_id', 'fk_prfnivel_nota')->references('id')->on('tblprofesornivel')->onDelete('cascade')->onUpdate('restrict');
 */
            $table->unsignedInteger('ani_id')->nullable();
            $table->foreign('ani_id', 'fk_aniacademico_nota')->references('id')->on('tblanioacademico')->onDelete('cascade')->onUpdate('restrict');

            /* $table->string('nivel')->nullable();
            $table->string('aula')->nullable();
            $table->string('trimestre')->nullable(); */
            $table->decimal('nota1', 10, 2)->nullable();
            $table->decimal('nota2', 10, 2)->nullable();
            $table->decimal('nota3', 10, 2)->nullable();
            $table->decimal('nota4', 10, 2)->nullable();
            $table->decimal('nota5', 10, 2)->nullable();
            $table->decimal('resul1', 10, 2)->nullable();
            $table->decimal('resul2', 10, 2)->nullable();
            $table->decimal('resul3', 10, 2)->nullable();
            $table->decimal('final1', 10, 2)->nullable();
            $table->decimal('final2', 10, 2)->nullable();
            $table->decimal('final3', 10, 2)->nullable();
            $table->decimal('notafinal', 10, 2)->nullable();
            $table->enum('aprobo', ['S', 'N'])->nullable()->default('N');
            $table->integer('estado')->default(1);
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
