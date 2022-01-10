<?php

namespace App\Repositories\Booking;

use App\Events\CustomerBooking;
use App\Helpers\Helper;
use App\Models\Booking;
use App\Models\Promotion;
use App\Models\Tour;
use App\Models\User;
use App\Notifications\SendNotificationToCustomers;
use App\Repositories\RepositoryEloquent;
use Illuminate\Support\Facades\DB;

class BookingRepositoryEloquent extends RepositoryEloquent implements BookingRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Booking::class;
    }

    /**
     * Lấy thông tin chi tiết một Tour
     *
     * @param int $tourId
     * @return Collection
     */
    public function getTour($tourId)
    {
        return Tour::find($tourId);
    }

    /**
     * Lấy các thẻ giảm giá có liên quan đến Tour
     *
     * @param int $tourId
     * @return Collection
     */
    public function getPromotion($tourId)
    {
        return Tour::find($tourId)->promotions()->get();
    }

    /**
     * Lấy tất cả các đơn booking.
     *
     * @return Collection
     */
    public function getAll($columns = [
        'bookings.id',
        'bookings.code',
        'users.name as user_name',
        'tours.name as tour_name',
        'booking_details.other_day as day',
        'booking_details.total_slot as slot',
        'booking_details.total_price as price',
        'payments.name as payment_name',
        'promotions.content as promotion_content',
    ])
    {
        return $this->_model->select($columns)
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('payments', 'bookings.payment_id', '=', 'payments.id')
            ->leftJoin('promotions', 'bookings.promotion_id', '=', 'promotions.id')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('tours', 'booking_details.tour_id', '=', 'tours.id')
            ->orderBy('bookings.created_at', 'desc')->get();
    }

    public function show($bookingId)
    {
        return $this->_model->select([
            'bookings.id',
            'bookings.code',
            'users.name as user_name',
            'tours.name as tour_name',
            'bookings.status',
            'booking_details.other_day as day',
            'payments.id as payment_id',
            'payments.name as payment_name',
            'promotions.id as promotion_id',
            'promotions.content as promotion_content',
            'bookings.created_at',
            'bookings.updated_at',
            'booking_details.adult_slot',
            'booking_details.adult_price',
            'booking_details.youth_slot',
            'booking_details.youth_price',
            'booking_details.child_slot',
            'booking_details.child_price',
            'booking_details.baby_slot',
            'booking_details.baby_price',
            'booking_details.total_slot',
            'booking_details.total_price',
        ])
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('payments', 'bookings.payment_id', '=', 'payments.id')
            ->leftJoin('promotions', 'bookings.promotion_id', '=', 'promotions.id')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('tours', 'booking_details.tour_id', '=', 'tours.id')
            ->where('bookings.id', $bookingId)->first();
    }

    /**
     * Lấy thông tin chi tiết của một đơn Booking
     *
     * @param string $code
     * @return array
     */
    public function getBookingDetail($code)
    {
        $booking = $this->_model->where('code', $code)->first();
        $bookingDetail = DB::table('booking_details')->where('booking_id', $booking->id)->first();
        // dd($booking->promotion_id);
        $data = [
            'code' => $booking->code,
            'name' => $booking->full_name,
            'email' => $booking->email,
            'phone' => $booking->phone,
            'address' => $booking->address,
            'note' => $booking->note,
            'status' => $booking->status,
            'promotion' => !empty($booking->promotion_id) ? $booking->promotion()->first()->content : 'No discount',
            'payment' => $booking->payment()->first()->name,
            'tour' => $this->getTour($bookingDetail->tour_id)->name,
            'date' => $bookingDetail->other_day,
            'adult_slot' => $bookingDetail->adult_slot,
            'adult_price' => $bookingDetail->adult_price,
            'youth_slot' => $bookingDetail->youth_slot,
            'youth_price' => $bookingDetail->youth_price,
            'child_slot' => $bookingDetail->child_slot,
            'child_price' => $bookingDetail->child_price,
            'baby_slot' => $bookingDetail->baby_slot,
            'baby_price' => $bookingDetail->baby_price,
            'total_slot' => $bookingDetail->total_slot,
            'total_price' => $bookingDetail->total_price,
            'created_at' => $booking->created_at,
        ];
        // dd($data);

        return $data;
    }

    /**
     * Lưu đơn booking
     *
     * @param Request $request
     * @return array ['title', 'msg', 'stt'[, 'booking_id']]
     */
    public function store($data)
    {
        // try {
        // dd($data);
        if ($data['user_id'] !== 1) {
            $user = User::find($data['user_id']);
            $data['full_name'] = $user->name;
            $data['phone'] = $user->phone;
            $data['email'] = $user->email;
            $data['address'] = $user->address;
        }

        $booking = $this->_model->create([
            'user_id' => $data['user_id'],
            'payment_id' => $data['payment_id'],
            'promotion_id' => $data['promotion_id'] ?? 1,
            'code' => Helper::generateCode(), //hàm generateCode() là static function,
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'note' => $data['note'] ?? 'null',
            'status' => $data['status'] ?? 0,
        ]);

        // dd($booking);
        DB::table('booking_details')->insert([
            'booking_id' => $booking->id,
            'tour_id' => $data['tour_id'],
            'other_day' => date('Y-m-d'), //date_format(date_create($data['other_day']), 'Y-m-d'), //date('Y-m-d',strtotime($dataother_day))
            'adult_price' => $data['adult_price'],
            'adult_slot' => $data['adult_slot'] ?? 0,
            'youth_price' => $data['youth_price'],
            'youth_slot' => $data['youth_slot'] ?? 0,
            'child_price' => $data['child_price'],
            'child_slot' => $data['child_slot'] ?? 0,
            'baby_price' => $data['baby_price'],
            'baby_slot' => $data['baby_slot'] ?? 0,
            'total_price' => $data['total_price'],
            'total_slot' => $data['total_slot'] ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // dd($bookingDetail);

        // Trừ đi số slot đã book
        $tour = Tour::find($data['tour_id']);
        $tour->slot = $tour->slot - $data['total_slot'];
        $tour->save();

        // Trừ đi 1 mã giảm giá
        if (!empty($data['promotion_id'])) {
            if ($data['promotion_id'] > 1) {
                $promotion = Promotion::find($data['promotion_id']);
                $promotion->amount = $promotion->amount - 1;
                $promotion->save();
            }
        }

        return [
            'title' => __('Done!'),
            'msg' => __('Booking successfully.'),
            'stt' => self::STATUS_SUCCESS,
            'booking_id' => $booking->id,
        ];
        // } catch (\Exception $e) {
        //     return [
        //         'title' => __('Oops! An error has occurred.'),
        //         'msg' => __('Booking failed.'),
        //         'stt' => self::STATUS_ERROR,
        //     ];
        // }
    }

    /**
     * Kiểm tra phương thức thanh toán
     *
     * @param int $bookingId
     * @return array ['view', 'data']
     */
    public function checkPaymentMethod($bookingId)
    {
        $booking = $this->find($bookingId);
        if ($booking->payment_id == 1) {
            return [
                'view' => 'frontend.booking.return',
                'data' => [
                    'msg' => __('Đặt chỗ thành công. Quý khách thanh toán tại quầy trong vòng 7 ngày để hoàn tất quá trình. Xin cảm ơn!'),
                    'status' => 1,
                ],
            ];
        } else if ($booking->payment_id == 2) {
            $data = [
                'booking_id' => $booking->id,
                'total_price' => DB::table('booking_details')->select('total_price')->where('booking_id', $booking->id)->first()->total_price,
            ];

            return [
                'route' => 'vnpay',
                'data' => $data,
            ];
        } else {
            return [
                'view' => 'frontend.booking.return',
                'data' => [
                    'msg' => __('Phương thức thanh toán không chính xác!'),
                    'status' => 2,
                ],
            ];
        }
    }

    /**
     * Lưu transaction.
     *
     * @param array $data
     */
    public function saveTransaction($data)
    {
        // dd($data);
        $bookingId = isset($data['vnp']['vnp_TxnRef']) ? $data['vnp']['vnp_TxnRef'] : (isset($data['cash']['booking_id']) ? $data['cash']['booking_id'] : null);

        if (!is_null($bookingId)) {
            $paymentId = $this->find($bookingId)->payment_id;
            $paymentName = DB::table('payments')->find($paymentId)->name;

            if ($paymentId === 1) {
                DB::table('transactions')->insert([
                    'booking_code' => $data['cash']['booking_code'],
                    'payment_method' => $paymentName,
                    'amount' => $data['cash']['total_price'],
                    'status' => $data['cash']['status'],
                    'pay_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return true;
            } elseif ($paymentId === 2) {
                $bookingCode = $this->find($data['vnp']['vnp_TxnRef'])->code;
                $dataInsert = [
                    'booking_code' => $bookingCode,
                    'payment_method' => $paymentName,
                    'amount' => $data['vnp']['vnp_Amount'] / 100,
                    'bank_code' => $data['vnp']['vnp_BankCode'],
                    'card_type' => $data['vnp']['vnp_CardType'],
                    'content' => $data['vnp']['vnp_OrderInfo'],
                    'pay_date' => date('Y-m-d H:i:s', strtotime($data['vnp']['vnp_PayDate'])),
                    'status' => $data['vnp']['vnp_ResponseCode'] === '00' ? 1 : 2,
                    // vnp_TransactionNo = 0
                    // vnp_TransactionStatus = 02
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                if (isset($data['vnp']['vnp_BankTranNo'])) $dataInsert['bank_no'] = $data['vnp']['vnp_BankTranNo'];
                DB::table('transactions')->insert($dataInsert);

                return true;
            }
        }
        return false;
    }

    /**
     * Cập nhật trạng thái thanh toán online thành công
     *
     * @param string $bookingId
     * @return boolean
     */
    public function successfulOnlinePayment($bookingId)
    {
        // Cập nhật trạng thái booking thành công (status == 1)
        $this->_model->find($bookingId)->update([
            'status' => 1,
        ]);

        return true;
    }

    /**
     * Cập nhật trạng thái thanh toán online không thành công (lỗi, hủy)
     *
     * @param string $bookingId
     * @param int $statusCode
     * @return boolean
     */
    public function failedOnlinePayment($bookingId, $statusCode = 2)
    {
        // Cập nhật trạng thái thất bại (status == 2)
        $this->_model->where('code', $bookingId)->update([
            'status' => $statusCode,
        ]);

        // Cập nhật lại số lượng slot của tour
        $booking = $this->_model->find($bookingId);
        $bookingDetail = DB::table('booking_details')->where('booking_id', $booking->id)->first();
        $tour = Tour::find($bookingDetail->tour_id);
        $tour->slot = $tour->slot + $bookingDetail->total_slot;
        $tour->save();

        // Cập nhật lại số lượng thẻ giảm giá
        if ($booking->promotion_id > 0) {
            $promotion = Promotion::find($booking->promotion_id);
            $promotion->amount = $promotion->amount + 1;
            $promotion->save();
        }

        return true;
    }

    /**
     *  Xử lí Booking request
     */
    public function handleBookingRequest($data)
    {
        // dd($data);
        if (isset($data['btn_accept'])) { // cap nhat status = 1
            $booking = $this->show($data['booking_id']);
            $dataBooking = [];
            $dataBookingDetail = [];
            $data['status'] = 1;

            if ($data['promotion_id'] !== $booking->promotion_id) {
                $dataBooking['promotion_id'] = $data['promotion_id'];
                $this->_model->where('id', $data['booking_id'])->update($dataBooking);
            }
            if ($data['adult_slot'] !== $booking->adult_slot) {
                $dataBookingDetail['adult_slot'] = $data['adult_slot'];
            }
            if ($data['youth_slot'] !== $booking->youth_slot) {
                $dataBookingDetail['youth_slot'] = $data['youth_slot'];
            }
            if ($data['child_slot'] !== $booking->child_slot) {
                $dataBookingDetail['child_slot'] = $data['child_slot'];
            }
            if ($data['baby_slot'] !== $booking->baby_slot) {
                $dataBookingDetail['baby_slot'] = $data['baby_slot'];
            }
            if ($data['total_slot'] !== $booking->total_slot) {
                $dataBookingDetail['total_slot'] = $data['total_slot'];
            }
            if ($data['total_price'] !== $booking->total_price) {
                $dataBookingDetail['total_price'] = $data['total_price'];
            }

            if (count($dataBookingDetail) > 0) {
                $dataBookingDetail['updated_at'] = now();
                DB::table('booking_details')->where('booking_id', $data['booking_id'])->update($dataBookingDetail);
            }
            # lưu transaction
            $dt['cash'] = $data;
            $rs = $this->saveTransaction($dt);
            if ($rs === true) {
                # update status
                $this->_model->where('id', $data['booking_id'])->update(['status' => $data['status']]);

                return [
                    'title' => __('Done!'),
                    'msg' => __('Booking request approved.'),
                    'stt' => self::STATUS_SUCCESS,
                ];
            } else {
                return [
                    'title' => __('Error!'),
                    'msg' => __('Save transaction failed! Booking has changed.'),
                    'stt' => self::STATUS_ERROR,
                ];
            }
        } elseif (isset($data['btn_remove'])) { // cap nhat status = 2
            // Cập nhật trạng thái thất bại (status == 2)
            $this->_model->where('id', $data['booking_id'])->update(['status' => 2]);

            // Cập nhật lại số lượng slot của tour
            $booking = $this->_model->find($data['booking_id']);
            $bookingDetail = DB::table('booking_details')->where('booking_id', $booking->id)->first();
            $tour = Tour::find($bookingDetail->tour_id);
            $tour->slot = $tour->slot + $bookingDetail->total_slot;
            $tour->save();

            // Cập nhật lại số lượng thẻ giảm giá
            if ($booking->promotion_id > 0) {
                $promotion = Promotion::find($booking->promotion_id);
                $promotion->amount = $promotion->amount + 1;
                $promotion->save();
            }

            return [
                'title' => __('Done!'),
                'msg' => __('Booking request removed.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        }
    }
}
