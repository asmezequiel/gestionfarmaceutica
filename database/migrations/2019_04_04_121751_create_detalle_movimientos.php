<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_movimiento');
            $table->unsignedInteger('medicamento_id');
            $table->integer('cant')->default(0);
            $table->timestamps();

            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
