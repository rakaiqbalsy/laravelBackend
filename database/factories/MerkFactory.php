<?php

$factory->define(App\Merk::class, function (Faker\Generator $faker) {
    return [
        "merk" => $faker->name,
        "carname" => $faker->name,
    ];
});
