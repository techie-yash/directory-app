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
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->unsignedBigInteger('user_id'); // User who uploaded the image
            $table->unsignedBigInteger('business_id'); // Associated business
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
        Schema::dropIfExists('social_media_links');
    }
};
