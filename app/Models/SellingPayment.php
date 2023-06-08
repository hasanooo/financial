<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingPayment extends Model
{
    use HasFactory;
    function payment_invoice()
    {
        return $this->belongsTo(SellingPayment::class,'sell_invoice_id');
    }
}