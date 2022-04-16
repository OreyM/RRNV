<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserForTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Api User',
            'email'     => 'apiuser@mail.com',
            'email_verified_at' => now(),
            'password'  => '$2y$10$grzk6QLvyVpUyF8vAvuZkeh794Wrsq5zuGkAgNtPAWcHVpryDMDAy', // secret
        ]);
    }
}
