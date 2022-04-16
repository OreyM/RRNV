<?php

namespace App\Models;

use App\Helpers\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, UUID;

    const PER_PAGE = 20;

    protected $fillable = [
        'name',
        'alias',
        'article',
        'description_id',
        'quantity',
        'stock_status_id',
        'image',
        'manufacturer_id',
        'price',
        'tax_rate_id',
        'reward_points',
        'minimum',
        'maximum',
        'is_active',
        'employee_id',
    ];

    public function stockStatuses()
    {
        return $this->belongsTo(StockStatus::class);
    }

    public function manufacterers()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function taxRates()
    {
        return $this->belongsTo(TaxRate::class);
    }
}
