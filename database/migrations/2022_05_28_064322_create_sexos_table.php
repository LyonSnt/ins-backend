<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblsexo', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('sex_descripcion', ['MASCULINO', 'FEMENINO']);
            $table->enum('sex_abreviatura',['H', 'M']);
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
        Schema::dropIfExists('tblsexo');
    }
}
