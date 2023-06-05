<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCash extends Model
{
    use HasFactory;
    public function Credit_Category()
    {
        return $this->belongsTo(CCategory::class, 'c_category_id');
    }
}
