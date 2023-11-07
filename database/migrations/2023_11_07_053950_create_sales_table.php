<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('customer_id'); // Foreign key to the Customers table
            $table->date('sale_date');
            $table->unsignedBigInteger('product_id'); // Foreign key to the Products table
            $table->integer('quantity_sold');
            $table->decimal('unit_price', 10, 2); // Decimal column for unit price
            $table->decimal('total_price', 10, 2); // Decimal column for total price
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraints
            $table->foreign('customer_id')->references('CustomerID')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
