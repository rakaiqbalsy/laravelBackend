<?php

use Illuminate\Database\Seeder;

class TestDriveSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nama' => 'Raka Iqbal Sy', 'email' => 'rakaiqbalsy@gmail.com', 'ktp' => '3214011710970004', 'alamat' => 'Perum Panorama', 'tanggal_test_drive' => '27/12/2018', 'jenis_sim' => 'SIM A', 'merk_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\TestDrive::create($item);
        }
    }
}
