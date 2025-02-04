<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Couple;
use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */

    public function Dashboard()
    {
        return view();
    }

    public function bookingCoupleIndex()
    {
        $bookingrequests = Booking::with(['couples'])->where('status', 0)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();

        return view('admin.masters.booking_couplepending')->with([
            'bookingrequests' => $bookingrequests
        ]);
    }
    public function bookingGroupIndex()
    {
        $bookingrequests = Booking::with(['groups']) // Removed unnecessary array syntax
            ->where('status', 0)
            ->latest()
            ->get();

        return view('admin.masters.booking_grouppending', compact('bookingrequests'));
    }

    public function coupleApprovedIndex()
    {
        $bookingrequests = Booking::where('status', 1)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
        return view('admin.masters.couple_approved')->with([
            'bookingrequests' => $bookingrequests
        ]);
    }
    public function coupleRejectedIndex()
    {


        $bookingrequests = Booking::where('status', 2)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
        return view('admin.masters.couple_rejected')->with([
            'bookingrequests' => $bookingrequests
        ]);
    }

    public function groupApprovedIndex()
    {
        $bookingrequests = Booking::where('status', 1)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
        return view('admin.masters.group_approved')->with([
            'bookingrequests' => $bookingrequests
        ]);
    }
    public function groupRejectedIndex()
    {
        $bookingrequests = Booking::where('status', 2)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
        return view('admin.masters.group_rejected')->with([
            'bookingrequests' => $bookingrequests
        ]);
    }

    public function coupleApproveBooking($id)
    {
        $booking = Booking::findOrFail($id);


        $booking->status = 1;
        $booking->save();


        $bookingrequest = Booking::where('status', 1)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking approved successfully!',
            'bookingrequest' => $bookingrequest
        ]);
    }

    public function groupApproveBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 1;
        $booking->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking approved successfully!',
        ]);
    }

    public function rejectBookingCouple($id)
    {
        $booking = Booking::findOrFail($id);


        $booking->status = 2;
        $booking->save();


        $bookingrequest = Booking::where('status', 1)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking Rejected successfully!',
            'bookingrequest' => $bookingrequest
        ]);
    }

    public function rejectBookingGroup($id)
    {

        $booking = Booking::findOrFail($id);

        $booking->status = 2;
        $booking->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking rejected successfully!',
        ]);
    }


    public function viewCouple($id)
    {

        $booking = Booking::with('couples')->findOrFail($id);
        return view('admin.masters.coupleview', compact('booking'));
    }

    public function viewGroup($id)
    {

        $booking = Booking::with('groups')->findOrFail($id);

        return view('admin.masters.groupview', compact('booking'));
    }
}
