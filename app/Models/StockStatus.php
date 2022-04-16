<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|StockStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockStatus query()
 * @mixin \Eloquent
 */
class StockStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
