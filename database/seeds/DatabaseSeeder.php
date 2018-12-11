<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(BeritumSeed::class);
        $this->call(MerkSeed::class);
        $this->call(RoleSeed::class);
        $this->call(TestDriveSeed::class);
        $this->call(UserSeed::class);

    }
}
