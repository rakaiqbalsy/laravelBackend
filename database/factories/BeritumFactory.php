<?php

$factory->define(App\Beritum::class, function (Faker\Generator $faker) {
    return [
        "judul" => $faker->name,
        "kontent" => $faker->name,
    ];
});
