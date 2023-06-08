<?php

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
        Schema::create('selling_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SellInvoice::class);
            $table->string('amount_paid');
            $table->string('payment_method')->nullable();
            $table->string('payment_account')->nullable();
            $table->string('payment_note')->nullable();
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
