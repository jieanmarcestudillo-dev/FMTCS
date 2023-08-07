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
        Schema::create('products', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_name');
            $table->string('prod_desc');
            $table->integer('prod_qty');
            $table->integer('prod_cost');
            $table->integer('prod_price');
            $table->integer('category');
            $table->integer('supplier');
            $table->string('prod_serial');
            $table->string('prod_pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
