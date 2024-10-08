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
        Schema::table('customers', function (Blueprint $table) {
            // Thêm các cột khóa ngoại
            $table->unsignedBigInteger('province_id')->nullable()->after('address');
            $table->unsignedBigInteger('district_id')->nullable()->after('province_id');
            $table->unsignedBigInteger('ward_id')->nullable()->after('district_id');

            // Đặt khóa ngoại cho các cột
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Xóa các khóa ngoại
            $table->dropForeign(['province_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['ward_id']);

            // Xóa các cột khóa ngoại
            $table->dropColumn(['province_id', 'district_id', 'ward_id']);
        });
    }
};
