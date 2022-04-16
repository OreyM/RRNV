<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Employee::create([
            'name'      => 'Dominic Toretto',
            'email'     => 'testy@mail.com',
            'password'  => '$2y$10$grzk6QLvyVpUyF8vAvuZkeh794Wrsq5zuGkAgNtPAWcHVpryDMDAy', //
            'is_active' => Employee::STATUS_ACTIVE,
        ]);

        $superAdmin->attachRole(
            Role::where('name', 'super-admin')->first()
        );
    }
}
