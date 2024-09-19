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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng products
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->integer('price'); // Giá sản phẩm tại thời điểm mua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
