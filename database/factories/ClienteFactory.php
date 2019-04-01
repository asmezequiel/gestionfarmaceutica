<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'apellido' 	=> $faker->name,
        'nombres' 	=> $faker->name,
        'dni'		=> $faker->unique()->numberBetween(400 , 10000),
        'direccion' => $faker->address,
        'telefono' 	=> rand(200000 , 500000),
        'celular' 	=> rand(200000 , 500000),
        'email'		=> $faker->unique()->safeEmail,
    ];
});
