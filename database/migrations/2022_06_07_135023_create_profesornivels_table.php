<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesornivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprofesornivel', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->foreign('id', 'fk_tblprofdato_tblprofnivel')->references('id')->on('tblprofesordato')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('niv_id');
            $table->foreign('niv_id', 'fk_tblnivel_tblprofnivel')->references('id')->on('tblnivel')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tblprofnivel')->references('id')->on('tblsexo')->onDelete('cascade')->onUpdate('restrict');

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
        Schema::dropIfExists('tblprofesornivel');
    }
}
