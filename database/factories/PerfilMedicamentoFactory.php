<?php

use Faker\Generator as Faker;

$factory->define(App\PerfilMedicamento::class, function (Faker $faker) {
    return [
        'nombre' 		=> $faker->name,
        'clasificacion' => $faker->text(10),
    ];
});
