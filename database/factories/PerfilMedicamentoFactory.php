<?php

use Faker\Generator as Faker;

$factory->define(App\PerfilMedicamento::class, function (Faker $faker) {
    return [
        'nombre' 		=> $faker->name,
        'descripcion'	=> $faker->name,
        'clasificacion' => $faker->text(10),
    ];
});
