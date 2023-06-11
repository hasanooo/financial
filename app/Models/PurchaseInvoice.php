<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use App\Models\Product;
use App\Models\PurchaseReturn;

class PurchaseInvoice extends Model
{
    use HasFactory;

    public function purchase_invoice_supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function purchase_invoice_purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function purchase_invoice_purchase_payment()
    {
        return $this->hasMany(PurchasePayment::class);
    }
    public function purchase_invoice_purchase_return()
    {
        return $this->hasMany(PurchaseReturn::class);
    }
   

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
