<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Couple;
use App\Models\Frarmhouse;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CoupleController extends Controller
{

    public function index()
    {
        $farmhouse = Frarmhouse::whereNull('deleted_at')->get();

        // return view('admin.masters.couple');

        return view('admin.masters.couple')->with([
            'farmhouse' => $farmhouse
        ]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $coupleCount = $request->input('couplecount');

        $rules = [
            'bdate' => 'required|date|after_or_equal:today',
            'couplecount' => 'required|integer|min:1|max:5',
            'customername' => 'required',
            'fname' => 'required|array|min:' . ($coupleCount),
            'lname' => 'required|array|min:' . ($coupleCount),
            'mobile' => 'required|array|min:' . ($coupleCount),
            'gender' => 'required|array|min:' . ($coupleCount),
            'document' => 'required|array|min:' . ($coupleCount),
            'document.*' => 'mimes:jpg,jpeg,pdf|max:10240',
        ];

        $messages = [
            'customername.required' => 'Customer name is required.',
            'bdate.required' => 'Booking date is required.',
            'bdate.after_or_equal' => 'Booking date must be future date.',
            'fname.*.required' => 'First name is required for each entry.',
            'lname.*.required' => 'Last name is required for each entry.',
            'mobile.*.required' => 'Mobile number is required for each entry.',
            'mobile.digits' => 'The mobile number must be exactly 10 digits.',
            'gender.*.required' => 'Gender is required for each entry.',
            'document.*.required' => 'Adhar card is required for each entry.',
        ];

        $validated = $request->validate($rules, $messages);

        // Store the booking data
        $booking = Booking::create([
            'booking_date' => $request->bdate,
            'couple_count' => $request->couplecount,
            'customername' => $request->customername,
        ]);

        // Store each customer
        foreach ($request->fname as $index => $firstName) {
            $customer = new Couple();
            $customer->booking_date = $request->bdate; // Corrected for the first booking_date
            $customer->customername = $request->customername;
            $customer->firstname = $request->fname[$index];
            $customer->lastname = $request->lname[$index];
            $customer->mobile = $request->mobile[$index];
            $customer->gender = $request->gender[$index];

            if ($request->hasFile('document.' . $index)) {
                $customer->document = $request->file('document.' . $index)->store('documents');
            }

            $customer->booking_id = $booking->id;
            $customer->save();
        }

        return response()->json(['success' => 'Couple booking successfully created']);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
