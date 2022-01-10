<?php

namespace App\Http\Controllers;

use App\Events\CustomerBooking;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    protected $repo;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->repo = $bookingRepository;
    }

    /*
    |---------------------------------------------------------------------------
    | Cac ham dung cho Admin.
    |---------------------------------------------------------------------------
    */
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $bookings = $this->repo->getAll();

        return view('backend.booking.index', compact('bookings'));
    }

    /**
     * Display a listing of Booking Request
     *
     * @return view
     */
    public function request()
    {
        $bookings = $this->repo->getBookingRequest();

        return view('backend.booking.request', compact('bookings'));
    }

    /**
     * Get detail for request
     */
    public function requestDetail($bookingId)
    {
        $booking = $this->repo->getBookingRequestDetail($bookingId);
        $promotions = $this->repo->getPromotion($booking->tour_id);

        return view('backend.booking.request_detail', compact('booking', 'promotions'));
    }

    /**
     * Accept/Update booking
     */
    public function updateRequest(Request $request, $bookingId)
    {
        $data = $request->all();
        // dd($data, isset($data['accept']), isset($data['remove']));
        $data['booking_id'] = $bookingId;
        $rs = $this->repo->handleBookingRequest($data);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.booking.request.index');
    }

    public function test()
    {
        $dt = [];
        $dt1['vnp'] = ['vnp_TxnRef' => 30];
        $dt2['cash'] = ['booking_id' => 20];

        $this->repo->saveTransaction($dt);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->repo->getAllUser();
        $tours = $this->repo->getAllTour();
        $payments = $this->repo->getAllPayment();
        $tourId = request()->query('tourId');
        // dd($tours);
        return view('backend.booking.add', compact('users', 'tours', 'payments', 'tourId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStep1(Request $request)
    {
        // dd($request->all());

        $query = [
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'payment_id' => $request->payment_id,
            'status' => $request->status,
        ];

        // dd($tour, count($promotions));


        return redirect()->route('admin.booking.hocks', $query);
    }

    public function hocks(Request $request)
    {
        // dd($request->all());
        $queryData = [
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'payment_id' => $request->payment_id,
            'status' => $request->status,
        ];
        $tour = $this->repo->getTour($request->tour_id);
        $promotions = $this->repo->getPromotion($request->tour_id);
        return view('backend.booking.add2', compact('tour', 'promotions', 'queryData'));
    }

    public function storeStep2(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $rs = $this->repo->store($data);
        session()->forget('booking');
        toast($rs['msg'], $rs['stt']);


        return redirect()->route('admin.booking.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = $this->repo->show($id);
        return view('backend.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        $rs = $this->repo->update($request, $id);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookingId)
    {
        $rs = $this->repo->destroy($bookingId);
        if ($rs['stt'] == 'error') {
            return response()->json($rs, 500);
        }

        return response()->json($rs);
    }

    /*
    |---------------------------------------------------------------------------
    | Cac ham dung cho User.
    |---------------------------------------------------------------------------
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userCreate($tourId)
    {
        $tour = $this->repo->getTour($tourId);
        $promotions = $this->repo->getPromotion($tourId);
        $payments = $this->repo->getAllPayment();

        $x = explode(',', $tour->other_day);
        $count = count($x);
        $i = 0;
        $ngayKhac = '[';
        foreach ($x as $key => $value) {
            if (++$i == $count) {
                $ngayKhac .= '\'' . $value . '\'';
            } else {
                $ngayKhac .= '\'' . $value . '\', ';
            }
        }
        $ngayKhac .= ']';
        // dd(explode(',', $tour->other_day));

        return view('frontend.booking.index', compact('tour', 'promotions', 'payments', 'ngayKhac'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        $dataStore = $request->all();
        if (isset($dataStore['full_name'])) {
            $dataStore['user_id'] = 1;
        } else {
            $dataStore['user_id'] = auth('user')->id();
        }
        $booking = $this->repo->store($dataStore);
        // dd($booking);
        if (isset($booking['booking_id'])) {
            $result = $this->repo->checkPaymentMethod($booking['booking_id']);
            // dd($result);
            if (isset($result['route'])) {
                return redirect()->route($result['route'], $result['data']);
            } else {
                $data = $result['data'];
                return view($result['view'], compact('data'));
            }
        }

        $data = [
            'msg' => __('Đặt chỗ thất bại!'),
            'status' => 2,
        ];
        return view('frontend.booking.return', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookingDetail($code)
    {
        $booking = $this->repo->getBookingDetail($code);

        return view('frontend.booking.detail', compact('booking'));
    }
}
