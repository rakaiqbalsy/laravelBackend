<?php

use Illuminate\Database\Seeder;

class BeritumSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

   // public $table = "BeritumSeed";
    public function run()
    {
        $items = [
           /* 
            ['id' => 1, 'judul' => 'Mobil Telah dirilis', 'kontent' => '<p>Mobil avanza telah dirilis 5 tahun lalu</p>
', 'picture' => '/tmp/phpEnSiWp',], */

        ];

        foreach ($items as $item) {
            \App\Beritum::create($item);
        }
    }
}
