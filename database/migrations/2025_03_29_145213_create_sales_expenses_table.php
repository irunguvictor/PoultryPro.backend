<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('type', ['sale', 'expense']);
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_expenses');
    }
}
