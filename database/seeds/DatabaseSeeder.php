<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
	        DatosTableSeeder::class,
	        ClientesSeeder::class,
	        PerfilMedicamentosSeeder::class,
	        MedicamentosSeeder::class,
	        MedicosSeeder::class,
	        MovimientosSeeder::class,
    	]);
        //$this->call(DatosTableSeeder::class);
    }
}
