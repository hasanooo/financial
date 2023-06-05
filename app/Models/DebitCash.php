<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitCash extends Model
{
    use HasFactory;
    function DCategory()
    {
        return $this->belongsTo(DCategory::class,'d_category_id');
    }
}
