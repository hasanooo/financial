<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCategory extends Model
{
    use HasFactory;
    public function credit()
    {
        return $this->hasMany(CreditCash::class);
    }
}
