<?php

namespace App\Repositories\Booking;

use App\Repositories\RepositoryInterface;

interface BookingRepositoryInterface extends RepositoryInterface
{
    public function getTour($tourId);
    public function getPromotion($tourId);
    public function getBookingDetail($code);
    public function checkPaymentMethod($bookingId);
    public function saveTransaction($data);
    public function successfulOnlinePayment($bookingCode);
    public function failedOnlinePayment($bookingCode, $statusCode = 2);
    public function handleBookingRequest($data);
}
