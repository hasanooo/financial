<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMI extends Model
{
    use HasFactory;
    public function Selling()
    {
        return $this->hasMany(SellingPayment::class, 'e_m_i_id');
    }
    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
