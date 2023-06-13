<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SellInvoice;
class SellingReturn extends Model
{
    use HasFactory;
    public function sale_return_sale_invoice()
    {
        return $this->belongsTo(SellInvoice::class, 'sell_invoice_id');
    }
}

