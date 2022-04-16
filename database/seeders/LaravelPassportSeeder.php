<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;

class LaravelPassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'user_id' => null,
            'name' => 'Laravel Personal Access Client',
            'secret' => config('passport.laravel_personal_access_client'),
            'provider' => null,
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Client::create([
            'user_id' => null,
            'name' => 'Laravel Password Grant Client',
            'secret' => config('passport.laravel_password_grant_client'),
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        PersonalAccessClient::create([
            'client_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
