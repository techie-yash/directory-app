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
        Schema::create('module_data', function (Blueprint $table) {
            $table->id();
            $table->enum('module', ['role', 'user_interest', 'event_type', 'form_type', 'offers']);
            $table->string('name')->nullable();
            $table->string('role')->nullable(); 
            $table->string('user_form_type')->nullable(); 
            $table->string('user_event_type')->nullable(); 
            $table->string('user_interests', 512)->nullable(); 
            $table->string('user_offers', 512)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_data');
    }
};
