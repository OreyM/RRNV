<?php

namespace Database\Seeders;

use App\Models\TaxRate;
use Illuminate\Database\Seeder;

class TaxRatesSeeder extends Seeder
{

    private array $taxRates;

    public function __construct()
    {
        $this->taxRates = require __DIR__ . '/data/tax_rates.php';
    }

    public function run()
    {
        TaxRate::insert($this->taxRates);
    }
}
