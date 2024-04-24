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
        Schema::create('business_image_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User who uploaded the image
            $table->unsignedBigInteger('business_id'); // Associated business
            $table->string('image');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('customers') ->onDelete('cascade');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_image_gallery');
    }
};
