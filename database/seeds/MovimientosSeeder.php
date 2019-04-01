<?php

use Illuminate\Database\Seeder;

class MovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$tipo_movimiento = array( 'alta' , 'baja' )
        for ($i = 0; $i <= 50; $i ++) { 
        	$movimiento = new App\MovimientoUsuario();
	        //$movimiento->num_movimiento = $i;
	        $movimiento->usuario()->associate( App\User::find(4) );	        
	        $movimiento->medico()->associate( App\Medico::all()->random() );
	        $movimiento->cliente()->associate( App\Cliente::all()->random() );
	        $movimiento->tipo_movimiento = "baja";
	        $movimiento->save();


	        for ($j=0; $j < rand(2 , 5) ; $j++) { 
	        	$detalle = new App\DetalleMovimiento();
	        	$detalle->crear( 	$i + 1 , 
	        						App\Medicamento::all()->random() , 
	        						rand(5 , 20) );
	        }
        }
    }
}
