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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('slogan')->nullable();
            $table->string('hq')->nullable();
            $table->text('about')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('keywords')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('whats_app_no')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('tax_doc_image')->nullable();
            $table->string('reg_doc_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
