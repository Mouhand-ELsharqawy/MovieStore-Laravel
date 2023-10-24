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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('addresses_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('stores_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('email');
            $table->string('pictureurl');
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_staff');
    }
};
