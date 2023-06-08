<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PurchaseInvoice;
use App\Models\Product;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PurchaseInvoice::class);
            $table->foreignIdFor(Product::class);
            $table->string('return_qty');
            $table->decimal('return_price',8,2)->default(0);
            $table->decimal('paid_amount',8,2)->default(0);
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
