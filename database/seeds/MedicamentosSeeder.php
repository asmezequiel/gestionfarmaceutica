<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 50; $i ++) { 
        	$perfil = App\PerfilMedicamento::all()->random();
	        
	        $medicamento = new App\Medicamento();

	        $medicamento->perfil()->associate( $perfil );

	        $medicamento->codigo = $faker->unique()->numberBetween(1 , 10000);

	        $medicamento->cant_blister = rand(5,20);

	        $medicamento->save();

	        $stock = new App\Stock();
	        $stock->medicamento()->associate( App\Medicamento::all()->last() );
	        $stock->cant = $medicamento->cant_blister * rand(10 , 50);
	        $stock->lote = $faker->unique()->word(3) . rand(1 , 300);
	        $stock->save();
        }
    }
}
