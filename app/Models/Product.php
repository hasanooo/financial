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
    function product_tax()
    {
        return $this->belongsTo(Tax::class);
    }
}