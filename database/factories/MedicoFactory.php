<?php

use Faker\Generator as Faker;

$factory->define(App\Medico::class, function (Faker $faker) {
    return [
        'apellido' 	=> $faker->name,
        'nombres' 	=> $faker->name,
        'dni'		=> rand(10000 , 50000),
        'direccion' => $faker->address,
        'telefono' 	=> rand(200000 , 500000),
        'celular' 	=> rand(200000 , 500000),
        'num_matricula' => $faker->unique()->numberBetween(1 , 10000),
    ];
});
