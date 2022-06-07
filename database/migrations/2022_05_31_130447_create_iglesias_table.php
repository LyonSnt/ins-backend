<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIglesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbliglesia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('igl_nombre');
            $table->string('igl_direccion');
            $table->string('igl_telefono');
            $table->string('igl_correo');
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
        Schema::dropIfExists('tbliglesia');
    }
}
