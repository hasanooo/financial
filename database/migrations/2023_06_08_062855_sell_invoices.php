<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sell_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->string('total_amount')->nullable();
            $table->foreignIdFor(Customer::class);
            $table->string('shipping_details')->nullable(); 
            $table->string('sellnote')->nullable();
            $table->integer('shipping_charge')->nullable();
            $table->string('status')->nullable();
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
