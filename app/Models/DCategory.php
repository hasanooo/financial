<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCategory extends Model
{
    use HasFactory;
    function DebitCash()
    {
        return $this->hasMany(DebitCash::class);
    }
}
