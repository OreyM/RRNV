<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaravelPassportSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(AdminTestSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(UserForTestSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TaxRatesSeeder::class);
        $this->call(StockStatusesSeeder::class);
        $this->call(ManufacturersSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
