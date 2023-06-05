<?php

use App\Models\CCategory;
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
        Schema::create('credit_cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CCategory::class)->nullable();
            $table->date('date');
            $table->string('particuler')->nullable();
            $table->string('cash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_cashes');
    }
};
