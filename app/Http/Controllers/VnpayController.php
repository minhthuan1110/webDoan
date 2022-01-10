<?php

namespace App\Http\Controllers;

use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Http\Request;

class VnpayController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepositoryInterface)
    {
        $this->bookingRepository = $bookingRepositoryInterface;
    }

    /**
     * Hàm gửi thông tin thanh toán đến VNpay
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $dataRq = $request->all();
        // session(['booking_code' => $dataRq['booking_id']]);
        // session(['url_prev' => url()->previous()]);

        // Các mã config đã để ở file .env rồi

        $hash_secret = env('VNP_HASH_SECRET');
        // $vnp_BankCode = $request->bank_code; //Mã ngân hàng

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $dataRq['total_price'] * 100, //Số tiền thanh toán. VNPAY phản hồi số tiền nhân thêm 100 lần.
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => request()->ip(),
            "vnp_Locale" => 'vn', //app()->getLocale()
            "vnp_OrderInfo" => 'Thanh toan booking', //Thông tin mô tả nội dung thanh toán (Tiếng Việt, không dấu).
            "vnp_OrderType" => 'billpayment', //Loại thanh toán; 'billpayment'
            "vnp_ReturnUrl" => env('VNP_RETURN_URL'),
            "vnp_TxnRef" => $dataRq['booking_id'], //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            "vnp_ExpireDate" => date('YmdHis', strtotime('+15 minutes', strtotime(date('YmdHis')))), //Add params version 2.0.1
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (isset($hash_secret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $hash_secret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    /**
     * Hàm trả lại kết quả (lấy kết quả tại link trong $vnp_Returnurl ở hàm create).
     */
    public function return(Request $request)
    {
        $vnp_HashSecret = env('VNP_HASH_SECRET'); //Chuỗi bí mật
        // Lay ma hash VnPay tra ve
        $vnp_SecureHash = $request->query('vnp_SecureHash');
        // Tao ma hash tu cac du lieu do VnPay tra ve
        $inputData = array();
        foreach ($request->query() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $data['vnp'] = $inputData;
        // dd($data);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // So sánh 2 mã hash vừa tạo bằng dữ liệu trả về và mã hashcuar VnPay
        if ($secureHash == $vnp_SecureHash) {
            // Check ResponseCode và update lại vào DB
            if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                // Lưu transaction
                $this->bookingRepository->saveTransaction($data);
                // Cập nhật trạng thái booking
                $this->bookingRepository->successfulOnlinePayment($inputData['vnp_TxnRef']);

                $data = [
                    'msg' => __('Giao dịch thành công.'),
                    'status' => 1,
                ];
            } else {
                // Lưu transaction
                $this->bookingRepository->saveTransaction($data);
                // Cập nhật trạng thái booking
                $this->bookingRepository->failedOnlinePayment($inputData['vnp_TxnRef'], 2);

                $data = [
                    'msg' => __('Giao dịch thất bại! Booking không thành công.'),
                    'status' => 2,
                ];
            }
        } else {
            $data = [
                'msg' => __('Chữ ký không hợp lệ.'),
                'status' => 2,
            ];
        }

        return view('frontend.booking.return', compact('data'));
    }
}
