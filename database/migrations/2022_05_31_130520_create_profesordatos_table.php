<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesordatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprofesordato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_cedula')->nullable();
            $table->string('pro_apellido')->nullable();
            $table->string('pro_nombre')->nullable();

            $table->unsignedInteger('sex_id')->nullable();
            $table->foreign('sex_id', 'fk_tblsexo_tblprofdato')->references('id')->on('tblsexo')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('esc_id');
            $table->foreign('esc_id', 'fk_tblestcivil_tblprofdato')->references('id')->on('tblestadocivil')->onDelete('cascade')->onUpdate('restrict');

            $table->date('pro_fechanacimiento')->nullable();
            $table->date('pro_fechabautismo')->nullable();
            $table->string('pro_celular')->nullable();
            $table->string('pro_direccion')->nullable();
            $table->unsignedInteger('igl_id')->nullable();
            $table->foreign('igl_id', 'fk_tbliglesia_tblprofdato')->references('id')->on('tbliglesia')->onDelete('cascade')->onUpdate('restrict');
            $table->string('pro_imagen');
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
        Schema::dropIfExists('tblprofesordato');
    }
}
