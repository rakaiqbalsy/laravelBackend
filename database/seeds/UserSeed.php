<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'rakaiqbalsy@gmail.com', 'password' => '$2y$10$WSEFYQ2u9Yui85i1Kx1gdO5B4hOlNF6FG3o0Hska5yrt49beLnCIa', 'role_id' => 1, 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
