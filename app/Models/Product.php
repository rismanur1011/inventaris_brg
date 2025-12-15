<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{

public function Category () {
    return $this->belongsTo(Category::class);
}
public function Supplier() {
    return $this->belongsTo(Supplier::class);
}

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable=[
        'name',
        'category_id',
        'supplier_id',
        'stock',
    ];

    }

