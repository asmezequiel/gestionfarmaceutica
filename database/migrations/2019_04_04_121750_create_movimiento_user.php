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
            //$table->enum( 'tipo_movimiento' , ['alta' , 'baja'] );
            $table->string('tipo_movimiento')->nullable();
            $table->string('detalle_tipo_movimiento')->nullable();
            //$table->enum( 'detalle_tipo_movimiento' , ['clearing' , 'entrega_cliente' , 'vencimiento' , 'recibimiento_medicamento']);

            //$table->enum( 'empresa' , ['remediar' , 'caminal']);            
            $table->integer('empresa')->nullable();
            
            $table->unsignedInteger('institucion_externa_id')->nullable(); 
            $table->integer('num_remito')->nullable();  
            $table->unsignedInteger('proveedor_id')->nullable();
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
