<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'description',
        'tags',
        'meta_keywords',
    ];
}
