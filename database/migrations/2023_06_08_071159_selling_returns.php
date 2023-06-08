<?php

use App\Models\Product;
use App\Models\SellInvoice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('selling_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SellInvoice::class);
            $table->foreignIdFor(Product::class);
            $table->string('return_qty');
            $table->decimal('return_price',8,2)->default(0);
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
