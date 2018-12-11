<?php

use Illuminate\Database\Seeder;

class MerkSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'merk' => 'TOYOTA', 'carname' => 'Avanza',],
            ['id' => 2, 'merk' => 'Nissan', 'carname' => 'Grand Livina',],

        ];

        foreach ($items as $item) {
            \App\Merk::create($item);
        }
    }
}
