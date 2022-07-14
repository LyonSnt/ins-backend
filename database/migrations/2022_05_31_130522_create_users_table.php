<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
         /*    $table->integer('id_rol'); */
            $table->enum("id_rol", ["Administrador", "Administrador2", "Profesor", "Estudiante"]);// <-- Aquí el enum

            $table->unsignedInteger('est_id')->nullable();
            $table->foreign('est_id', 'fk_tblestudiante_tblusers')->references('id')->on('tblestudiante')->onDelete('cascade')->onUpdate('restrict');

            $table->unsignedInteger('pro_id')->nullable();
            $table->foreign('pro_id', 'fk_tblprodato_tblusers')->references('id')->on('tblprofesordato')->onDelete('cascade')->onUpdate('restrict');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
