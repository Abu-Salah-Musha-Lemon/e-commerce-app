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
        Schema::create('shopping_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('phoneNumber');
            $table->string('presentAddress');
            $table->string('postalCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_addresses');
    }
};
