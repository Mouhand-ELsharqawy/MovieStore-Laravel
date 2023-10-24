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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cities_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('address2')->nullable();
            $table->string('district');
            $table->string('street');
            $table->string('building');
            $table->string('googleearthlocation');
            $table->string('phone');
            $table->string('telephone');
            $table->string('postalcode');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
