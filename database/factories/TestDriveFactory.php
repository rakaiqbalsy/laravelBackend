<?php

$factory->define(App\TestDrive::class, function (Faker\Generator $faker) {
    return [
        "nama" => $faker->name,
        "email" => $faker->safeEmail,
        "ktp" => $faker->name,
        "alamat" => $faker->name,
        "tanggal_test_drive" => $faker->date("d/m/Y", $max = 'now'),
        "jenis_sim" => $faker->name,
        "merk_id" => factory('App\Merk')->create(),
    ];
});
