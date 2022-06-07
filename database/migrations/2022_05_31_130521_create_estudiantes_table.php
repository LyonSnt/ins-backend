<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblestudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('est_cedula');
            $table->string('est_apellido');
            $table->string('est_nombre');

            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tblestudiante')->references('id')->on('tblsexo')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('esc_id');
            $table->foreign('esc_id', 'fk_tblestcivil_tblestudiante')->references('id')->on('tblestadocivil')->onDelete('cascade')->onUpdate('restrict');

            $table->date('est_fechanacimiento');
            $table->date('est_fechabautismo');
            $table->string('est_celular');
            $table->string('est_direccion');
            $table->unsignedInteger('igl_id');
            $table->foreign('igl_id', 'fk_tbliglesia_tblestudiante')->references('id')->on('tbliglesia')->onDelete('cascade')->onUpdate('restrict');
            $table->string('est_imagen');
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
        Schema::dropIfExists('tblestudiante');
    }
}
