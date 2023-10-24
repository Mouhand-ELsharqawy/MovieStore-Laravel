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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rentals_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('customers_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('staff_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('amount');
            $table->date('paymentdate');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_payments');
    }
};
