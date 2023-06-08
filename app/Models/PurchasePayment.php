<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseInvoice;

class PurchasePayment extends Model
{
    use HasFactory;
    
    public function purchase_payment_purchase_invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function purchase_payment_supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
