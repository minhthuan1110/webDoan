<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::insert([
            [
                'name' => 'Thanh toán bằng tiền mặt',
                'description' => 'Quý khách thực hiện giao dịch tại quầy của VieTour.',
            ], [
                'name' => 'Thanh toán quan VNPAY',
                'description' => 'Quý khách thực hiện thanh toán trực tuyến qua ví điện tử VNPAY.',
            ],
        ]);
    }
}
