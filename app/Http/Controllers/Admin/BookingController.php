<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bookingCouplePendingIndex()
    {
        $bookingrequest = Booking::where('status', 0)
        ->whereNotNull('couple_count')
        ->get();
    
        return view('admin.masters.booking_couplepending', compact('bookingrequest'));
       
    }
    public function bookingGroupPendingIndex()
    {
        $bookingrequest = Booking::where('status', 0)
        ->whereNotNull('group_member')
        ->get();
    
        return view('admin.masters.booking_grouppending', compact('bookingrequest'));
       
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

    public function viewCouple($id)
    {
        // Fetch booking information based on the id passed
        $booking = Booking::find($id);

        // Fetch the customer related to this booking
        if ($booking) {
            $customer = $booking->customers;  // Assuming 'customer' is a relationship on the Booking model
         
            return view('admin.masters.coupledocument', compact('customer'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Booking not found.');
        }
    }
    public function viewGroup($id)
    {
        // Fetch booking information based on the id passed
        $booking = Booking::find($id);

        // Fetch the customer related to this booking
        if ($booking) {
            $customer = $booking->customers;  // Assuming 'customer' is a relationship on the Booking model
         
            return view('admin.masters.groupdocument', compact('customer'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Booking not found.');
        }
    }
}
