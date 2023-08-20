<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }


    public function  purchase_returns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }

    function product_tax()
    {
        return $this->belongsTo(Tax::class,'tax_id');
    }
}