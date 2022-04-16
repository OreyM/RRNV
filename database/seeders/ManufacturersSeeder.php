<?php

namespace Database\Seeders;


use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersSeeder extends Seeder
{

    private array $manufacturers;

    public function __construct()
    {
        $this->manufacturers = require __DIR__ . '/data/manufacturers.php';
    }

    public function run(): void
    {
        foreach ($this->manufacturers as $manufacturer) {
            Manufacturer::create([
                'name'  => $manufacturer['name'],
                'alias' => \Str::slug($manufacturer['name']),
            ]);
        }
    }
}
