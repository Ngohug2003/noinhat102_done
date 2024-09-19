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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng categories
            $table->string('name');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
