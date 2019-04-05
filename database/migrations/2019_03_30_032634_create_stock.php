<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medicamento_id');
            //$table->enum('empresa' , ['remediar' , 'caminal']);
            $table->integer('empresa')->nullable();
            $table->integer('cant')->default(0);
            $table->string('lote');
            $table->date('fecha_vencimiento')->format('d.m.Y');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('stock');
    }
}
