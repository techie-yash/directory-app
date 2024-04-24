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
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('image')->default('male');
            $table->boolean('food')->default(false)->after('image')->nullable();
            $table->boolean('lover')->default(false)->after('image')->nullable();
            $table->boolean('swimming')->default(false)->after('image')->nullable();
            $table->boolean('travel')->default(false)->after('image')->nullable();
            $table->boolean('hotels')->default(false)->after('image')->nullable();
            $table->string('phone', 255)->nullable()->after('country');
            $table->string('age', 255)->nullable()->after('country');
            $table->string('city', 255)->nullable()->after('country');
            $table->string('region', 255)->nullable()->after('country')->nullable();
            $table->enum('user_type', ['admin', 'user'])->default('admin')->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Schema::dropIfExists('users');
        });
    }
};
