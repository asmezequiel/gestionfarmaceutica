<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles_usuarios', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->primary();
            $table->string('apellido');
            $table->string('nombres');
            $table->integer('dni')->unsigned()->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('celular');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiles_usuarios');
    }
}
