<?php

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
        Schema::create('monthly_cashes', function (Blueprint $table) {
            $table->id();
            // $table->date('date');
            $table->string('month_name')->nullable();
            $table->string('dedit_total')->nullable();
            $table->string('credit_total')->nullable();
            $table->string('final_cash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_cashes');
    }
};
