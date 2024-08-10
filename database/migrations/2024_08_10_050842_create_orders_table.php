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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId'); // Foreign key for user
            $table->unsignedBigInteger('ProductId'); // Foreign key for product
            $table->decimal('ProductPrice', 8, 2); // Price with 2 decimal points
            $table->integer('ProductQty'); // Quantity
            $table->string('userPhone'); // Phone number
            $table->string('userPresentAddress'); // Address
            $table->string('userPostalCode'); // Postal code
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
