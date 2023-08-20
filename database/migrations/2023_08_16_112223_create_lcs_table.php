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
        Schema::create('lcs', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('issue_date');
            $table->string('payment_date');
            $table->string('total_amount');
            $table->string('bank_name');
            $table->string('any_details');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lcs');
    }
};