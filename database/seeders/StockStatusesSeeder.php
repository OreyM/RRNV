<?php

namespace Database\Seeders;

use App\Models\StockStatus;
use Illuminate\Database\Seeder;

class StockStatusesSeeder extends Seeder
{
    private array $stockStatuses;

    public function __construct()
    {
        $this->stockStatuses = require __DIR__ . '/data/stock-statuses.php';
    }

    public function run(): void
    {
        foreach ($this->stockStatuses as $status) {
            StockStatus::create([
                'name'  => $status['name'],
                'alias' => \Str::slug($status['name']),
            ]);
        }
    }
}
