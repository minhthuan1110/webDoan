<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('FK to users')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('payment_id')->comment('FK to payments')
                ->references('id')->on('payments')
                ->onDelete('cascade');
            $table->foreignId('promotion_id')->comment('FK to promotions')
                ->references('id')->on('promotions')
                ->onDelete('cascade');
            $table->string('code');
            $table->string('full_name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 là đơn đã hoàn thành');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->comment('FK to booking')
                ->references('id')->on('bookings')
                ->onDelete('cascade');
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
                ->onDelete('cascade');
            $table->date('other_day');
            $table->integer('adult_slot')->default(0);
            $table->decimal('adult_price', 12, 2)->nullable()->comment('Giá nguời lớn trên 11 tuổi');
            $table->integer('youth_slot')->default(0);
            $table->decimal('youth_price', 12, 2)->nullable()->comment('Giá trẻ em 5 -> 11 tuổi');
            $table->integer('child_slot')->default(0);
            $table->decimal('child_price', 12, 2)->nullable()->comment('Giá trẻ nhỏ 2 -> 4 tuổi');
            $table->integer('baby_slot')->default(0);
            $table->decimal('baby_price', 12, 2)->nullable()->comment('Giá em bé duới 2 tuổi');
            $table->integer('total_slot')->nullable()->comment('Tổng slot');
            $table->decimal('total_price', 12, 2)->nullable()->comment('Tổng giá');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('booking_details');
    }
}
