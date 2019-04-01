<?php

use Illuminate\Database\Seeder;

class PerfilMedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PerfilMedicamento::class, 50)->create();
    }
}
