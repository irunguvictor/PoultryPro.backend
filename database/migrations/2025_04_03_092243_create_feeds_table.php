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
    Schema::create('feeds', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // Type of feed
        $table->decimal('quantity', 10, 2); // Quantity in KG
        $table->integer('chickens_count'); // Number of chickens
        $table->decimal('avg_weight', 5, 2); // Average weight of a chicken
        $table->date('date'); // Date of record
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};
