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
            $table->string('est_cedula')->nullable();
            $table->string('est_apellido')->nullable();
            $table->string('est_nombre')->nullable();

            $table->unsignedInteger('sex_id')->nullable();
            $table->foreign('sex_id', 'fk_tblsexo_tblestudiante')->references('id')->on('tblsexo')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('esc_id')->nullable();
            $table->foreign('esc_id', 'fk_tblestcivil_tblestudiante')->references('id')->on('tblestadocivil')->onDelete('cascade')->onUpdate('restrict');

            $table->date('est_fechanacimiento')->nullable();
            $table->date('est_fechabautismo')->nullable();
            $table->string('est_celular')->nullable();
            $table->string('est_direccion')->nullable();
            $table->unsignedInteger('igl_id')->nullable();
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
