<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'id_categoria' => rand(1,4),
        'nombre' => $faker->sentence,
        'idioma' => $faker->sentence,
        'direccion_url'=> $faker->sentence,
    ];
});
