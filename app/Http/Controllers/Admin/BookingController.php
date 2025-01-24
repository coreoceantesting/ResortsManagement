<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bookingPendingIndex()
    {
        $bookingrequest = Booking::where('status', 0)->get();
        return view('admin.masters.booking_pending', compact('bookingrequest'));
       
    }
    public function bookingApprovedIndex()
    {
        $bookingrequest = Booking::where('status', 1)->get();
        return view('admin.masters.booking_approved', compact('bookingrequest'));
    }
    public function bookingRejectedIndex()
    {
        $bookingrequest = Booking::where('status', 2)->get();
        return view('admin.masters.booking_rejected', compact('bookingrequest'));
    }

    public function approveBooking($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the status to approved (1)
        $booking->status = 1;
        $booking->save();

        return response()->json(['status' => 'success', 'message' => 'Booking approved successfully!']);
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 2;
        $booking->save();

        return response()->json(['status' => 'success', 'message' => 'Booking rejected successfully!']);
    }
}
