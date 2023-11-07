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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('CompanyID');
            $table->string('Company_Name');
            $table->unsignedBigInteger('Contact_Person'); // Foreign key to Customers' CustomerID
            $table->string('Email')->nullable();
            $table->string('Phone')->nullable();
            $table->text('Address')->nullable();
            $table->timestamps();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('Contact_Person')->references('CustomerID')->on('customers'); // Assuming 'customers' is the table name with the 'CustomerID' column.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
