<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('perfil_medicamento_id');
            $table->integer('codigo');
            $table->string('descripcion');
            $table->integer('cant_blister');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('perfil_medicamento_id')->references('id')->on('perfil_medicamentos')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
}
