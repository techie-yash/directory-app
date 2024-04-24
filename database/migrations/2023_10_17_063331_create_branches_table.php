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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branchName');
            $table->string('branchNameArabic');
            $table->string('region');
            $table->string('city');
            $table->string('state');
            $table->string('street');
            $table->string('phone_no');
            $table->string('mobile_no');
            $table->string('whatsapp_no');
            $table->text('mapIframe');
            $table->string('zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
