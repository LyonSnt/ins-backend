<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadocivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblestadocivil', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('esc_decripcion', ['CASADO/A', 'SOLTERO/A', 'VIUDO/A', 'DIVORCIADO/A']);
            $table->enum('esc_abreviatura',['C', 'S', 'V', 'D']);
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
        Schema::dropIfExists('tblestadocivil');
    }
}
