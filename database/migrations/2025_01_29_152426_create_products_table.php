<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Multi-language name
            $table->string('slug')->unique();
            $table->json('description')->nullable(); // Multi-language description
            $table->json('url')->nullable(); // External URL
            $table->string('thumbnail')->nullable(); // Path to image
            $table->integer('price');
            $table->boolean('status')->default(false);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
