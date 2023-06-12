<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function customer_invoice()
    {
        return $this->hasMany(SellingInvoice::class);
    }
    public function EMI()
    {
        return $this->hasOne(EMI::class);
    }
    
}