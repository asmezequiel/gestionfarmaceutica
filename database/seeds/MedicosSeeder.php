<?php

use Illuminate\Database\Seeder;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Medico::class, 50)->create();
    }
}
