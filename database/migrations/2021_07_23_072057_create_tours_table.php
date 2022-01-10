<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->comment('FK to areas')
                ->references('id')->on('areas')
                ->onDelete('no action');
            $table->foreignId('location_id')->comment('FK to locations')
                ->references('id')->on('locations')
                ->onDelete('no action');
            $table->string('name')->comment('Tên tour');
            $table->string('code')->comment('Mã tour');
            $table->string('image_path', 2048)->nullable();
            $table->string('description', 2048)->comment('Mô tả');
            $table->string('departure_location')->nullable()->comment('Địa điểm khởi hành');
            $table->string('departure_time')->nullable()->comment('Thời gian khởi hành');
            $table->string('return_time')->nullable()->comment('Thời gian trở về');
            $table->string('destination')->nullable()->comment('Đích đến');
            $table->string('itinerary')->nullable()->comment('Hành trình');
            $table->integer('slot')->comment('Số chỗ');
            $table->string('other_day', 1024)->comment('Các ngày khởi hành khác');
            $table->decimal('adult_price', 12, 2)->comment('Giá người lớn từ 12t trở lên');
            $table->decimal('youth_price', 12, 2)->comment('Giá trẻ em 5t đến 11t');
            $table->decimal('child_price', 12, 2)->comment('Giá trẻ nhỏ 2t đến 4t');
            $table->decimal('baby_price', 12, 2)->comment('Giá sơ sinh dưới 2t');
            $table->tinyInteger('display')->default(1)->comment('1 là hiển thị');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tour_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
                ->onDelete('cascade');
            $table->integer('day');
            $table->longText('content');
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('tour_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
                ->onDelete('cascade');
            $table->string('image_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
        Schema::dropIfExists('tour_plans');
        Schema::dropIfExists('tour_images');
    }
}
