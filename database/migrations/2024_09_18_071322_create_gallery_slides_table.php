<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerySlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_slides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slide_id'); // ID của slide liên quan
            $table->string('image'); // Đường dẫn đến hình ảnh trong gallery
            $table->timestamps(); // Các cột created_at và updated_at

            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade'); // Khóa ngoại liên kết với bảng slides
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_slides');
    }
}
