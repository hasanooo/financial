<?php

use App\Models\Customer;
use App\Models\Product;
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
        Schema::create('e_m_i_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->nullable();
            $table->foreignIdFor(Product::class)->nullable();
            $table->string('invoice')->nullable();
            $table->string('date')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_price')->nullable();
            $table->string('tax')->default(0);
            $table->string('discount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('emi_rate')->nullable();
            $table->string('duration')->nullable();
            $table->string('emi_quantity')->nullable();
            $table->string('emi_amount')->nullable();
            $table->string('with_profit')->nullable();
            $table->string('type')->nullable();
            $table->string('bank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_m_i_s');
    }
};
