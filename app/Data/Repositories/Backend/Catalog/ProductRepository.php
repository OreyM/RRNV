<?php

namespace App\Data\Repositories\Backend\Catalog;


use App\Core\Abstracts\Repository;
use App\Http\Resources\Backend\Catalog\Products\ProductTableCollection;
use App\Models\Product;
use Illuminate\Database\Query\Builder;

class ProductRepository extends Repository
{

    /**
     * @var Product
     */
    protected $model = Product::class;

    /**
     * @var Builder
     */
    protected $table = 'products';

    private function getProductsForTableQuery()
    {
        return $products = $this->table
            ->select(
                'products.id',
                'products.name AS product_name',
                'products.alias',
                'products.article',
                'products.quantity',
                'products.image',
                'products.price',
                'products.is_active',
                'products.deleted_at',
                'stock_statuses.name AS stock_status',
            )
            ->join('stock_statuses', 'stock_statuses.id',
                '=',
                'products.stock_status_id'
            );
    }

    public function getProductsForTable(?int $perPage = null): ProductTableCollection
    {
        $perPage = $perPage ?? Product::PER_PAGE;

        $products = $this->getProductsForTableQuery()
            ->where('products.deleted_at', '=', null)
            ->orderBy('product_name');

        return new ProductTableCollection($products->paginate($perPage));
    }

    public function getFiteredProduct(string $filter, ?int $perPage = null): ProductTableCollection
    {
        $perPage = $perPage ?? Product::PER_PAGE;

        $products = $this->getProductsForTableQuery()
            ->where('products.deleted_at', '=', null)
            ->where('products.name', 'LIKE', '%' . $filter . '%')
            ->orWhere('products.article', 'LIKE', '%' . $filter . '%')
            ->orderBy('product_name');

        return new ProductTableCollection($products->paginate($perPage));
    }

    public function getSortedProductsForTable(
        ?string $filter,
        string $sortBy,
        bool $sortDesc,
        ?int $perPage = null
    ): ProductTableCollection
    {
        $perPage = $perPage ?? Product::PER_PAGE;

        $products = $this->getProductsForTableQuery()
            ->where('products.deleted_at', '=', null);

        if ($filter) {
            $products->where('products.name', 'LIKE', '%' . $filter . '%')
                ->orWhere('products.article', 'LIKE', '%' . $filter . '%');
        }

        switch ($sortBy) {
            case 'stock_status':
                $sortDesc ?
                    $products->orderByDesc('stock_status') :
                    $products->orderBy('stock_status');
                break;
            default:
                $sortDesc ?
                    $products->orderByDesc('products.' . $sortBy) :
                    $products->orderBy('products.' . $sortBy);
        }

        return new ProductTableCollection($products->paginate($perPage));
    }

    public function changeProductStatus(string $uuid): int
    {
        $product = $this->model->find($uuid);

        return $product->update([
            'is_active' => !$product->is_active
        ]);
    }

    public function deleteProduct(string $uuid): bool
    {
        return $this->model->where('id', $uuid)->delete();
    }

    public function checkAlias(string $alias): bool
    {
        return $this->model->where('alias', $alias)->exists();
    }
}
