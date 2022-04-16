<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{

    use HasFactory;

    const PERCENTAGE = 'P';
    const FIXED_AMOUNT = 'FA';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'alias',
        'rate',
        'type',
        'description',
    ];
}
