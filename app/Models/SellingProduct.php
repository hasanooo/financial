<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingProduct extends Model
{
    use HasFactory;
    function sale_invoice()
    {
        return $this->belongsTo(SellInvoice::class,'sell_invoice_id	');
    }
    function sale_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}