<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SellingReturn;

class SellInvoice extends Model
{

    use HasFactory;

    function invoice_customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function invoice_payment()
    {
        return $this->hasMany(SellingPayment::class);
    }
    public function invoice_sale()
    {
        return $this->hasMany(SellingProduct::class);
    }

    public function sale_invoice_sale_return()
    {
        return $this->hasMany(SellingReturn::class);
    }
}