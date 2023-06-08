<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
class SellingInvoice extends Model
{
    use HasFactory;
    function invoice_customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
   
}