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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['about_us', 'contact_us']); // Add enum type column
            $table->text('about_us_title')->nullable();
            $table->text('about_us_description')->nullable();
            $table->text('who_we_are')->nullable();
            $table->text('service1')->nullable();
            $table->text('service2')->nullable();
            $table->text('service3')->nullable();
            $table->string('office_address')->nullable(); // Add office_address field
            $table->string('email')->nullable(); // Add email field
            $table->string('phone')->nullable(); // Add phone field
            $table->text('map_iframe')->nullable(); // Add map_iframe field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
