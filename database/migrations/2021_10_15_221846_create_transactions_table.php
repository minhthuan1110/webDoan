<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->comment('Mã đơn đặt chỗ');
            $table->string('payment_method')->comment('Tên phương thức thanh toán');
            $table->string('transaction_no')->nullable()->comment('Mã GD tại phương thức thanh toán');
            $table->string('bank_code')->nullable()->comment('Tên ngân hàng');
            $table->string('bank_no')->nullable()->comment('Mã GD tại ngân hàng');
            $table->decimal('amount', 12, 2)->comment('Số tiền thanh toán');
            $table->string('card_type')->nullable()->comment('Loại thẻ,tài khoản');
            $table->tinyInteger('status')->comment('Trạng thái thanh toán');    // 0-unpaid; 1-paid/success; 2-failed
            $table->string('content')->nullable()->comment('Nội dung thanh toán');
            $table->dateTime('pay_date')->comment('Ngày thanh toán');
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
        Schema::dropIfExists('transactions');
    }
}
