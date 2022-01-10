<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        # lấy đơn book trong 1 tháng
        $range30days = Carbon::now()->subDays(30);
        $stats = DB::table('bookings')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('tours', 'booking_details.tour_id', '=', 'tours.id')
            ->groupBy('date')
            ->where('bookings.created_at', '>=', $range30days)
            ->get([
                DB::raw('DATE(bookings.created_at) as date'),
                DB::raw('COUNT(*) as number_of_booking'),
                DB::raw('SUM(booking_details.total_price) as price'),
            ]);
        $totalNumberOfBooking = 0;
        $totalPrice = 0;
        foreach ($stats as $stat) {
            $totalNumberOfBooking += $stat->number_of_booking;
            $totalPrice += $stat->price;
        }
        // dd($stats->toArray());
        return view('backend.report.index', compact('stats', 'totalNumberOfBooking', 'totalPrice'));
    }

    public function pdf(Request $request)
    {
        $data['stat'] = json_decode($request->all()['stat']);
        $data['total_number_of_booking'] = $request->all()['total_number_of_booking'];
        $data['total_price'] = $request->all()['total_price'];
        // dd($data);
        $pdf = PDF::loadView('export.report_pdf', compact('data'));
        return $pdf->download('report.pdf');
        // return view('export.report_pdf', compact('data', 'totalNumberOfBooking', 'totalPrice'));
    }
}
