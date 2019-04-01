<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_user', function (Blueprint $table) {
            $table->increments('num_movimiento');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('medico_id')->nullable();
            $table->unsignedInteger('cliente_id')->nullable();
            $table->enum( 'tipo_movimiento' , ['alta' , 'baja'] ); 
            $table->integer('num_remito')->nullable();  
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');            
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('SET NULL');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_user');
    }
}
