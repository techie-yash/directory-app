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
            $table->id();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('before_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('until_date')->nullable();
            $table->text('description')->nullable();
            $table->string('media')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Define the foreign key relationship with cascade
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); // This enables cascading delete
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
