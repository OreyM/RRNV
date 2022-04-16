<?php

namespace Database\Seeders;

use App\Data\Repositories\Backend\Catalog\ManufacturerRepository;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Data\Repositories\Backend\Localization\StockStatusRepository;
use App\Data\Repositories\Backend\Localization\TaxRateRepository;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{

    private Faker $faker;
    private array $productsList;
    private array $stockStatuses;
    private array $manufacturers;
    private array $taxRates;
    private string $superAdminUUID;

    public function __construct(
        EmployeeRepository $employeeRepository,
        StockStatusRepository $stockStatusRepository,
        ManufacturerRepository $manufacturerRepository,
        TaxRateRepository $taxRateRepository
    )
    {
        $this->faker = new Faker();
        $this->productsList = require __DIR__ . '/data/products.php';
        $this->stockStatuses = $stockStatusRepository->getAllStockStatusesAliasKeyArray();
        $this->manufacturers = $manufacturerRepository->getAllManufacturersAliasKeyArray();
        $this->taxRates = $taxRateRepository->getAllTaxRatesIdsArray();
        $this->superAdminUUID = $employeeRepository->getFirstSuperAdminUUID();
    }

    public function run()
    {
        $products = [];

        foreach ($this->productsList as $product) {
            $price = $this->faker->randomFloat(2, 99, 9999);
            $taxRate = $this->taxRates[array_rand($this->taxRates, 1)];

            $products[] = [
                'id'                => \Str::uuid(),
                'name'              => $product['name'],
                'alias'             => \Str::slug($product['name']),
                'article'           => $this->articleGenerator($product['manufacturer_alias']),
                'quantity'          => $this->faker->numberBetween(99, 999),
                'stock_status_id'   => $this->stockStatuses[$product['stock_status_alias']],
                'image'             => $product['image'],
                'manufacturer_id'   => $this->manufacturers[$product['manufacturer_alias']],
                'price'             => $price,
                'tax_rate_id'       => $taxRate,
                'reward_points'     => $product['reward_points'],
                'minimum'           => 1,
                'maximum'           => 10,
                'is_active'         => mt_rand(0, 1),
                'employee_id'       => $this->superAdminUUID,
            ];
        }

        Product::insert($products);
    }

    private function articleGenerator(string $manufacturerAlias): string
    {
        $sub = \Str::upper(mb_substr($manufacturerAlias, 0, 2));
        $number = mt_rand(100000, 999999);

        return $sub . '-' . $number;
    }
}
