<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseInvoice;
use App\Models\Product;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_price_id',
        'purchase_invoice_id',
        'purchase_qtn',
    ];

    public function purchase_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function purchase_purchase_invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'purchase_invoice_id');
    }

    

}
