<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CoupleController extends Controller
{
    
    public function index()
    {
        return view('admin.masters.couple');
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $coupleCount = $request->input('couplecount');

        // Validate couple count and ensure the correct number of rows are submitted
        $rules = [
            'couplecount' => 'required|integer|min:1|max:5',
            'fname' => 'required|array|min:' . ($coupleCount * 2),
            'lname' => 'required|array|min:' . ($coupleCount * 2),
            'mobile' => 'required|array|min:' . ($coupleCount * 2),
            'gender' => 'required|array|min:' . ($coupleCount * 2),
            'document' => 'required|array|min:' . ($coupleCount * 2),
        ];
    
        $messages = [
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
        ]);

        // Store each customer
        foreach ($request->fname as $index => $firstName) {
            $customer = new Customer();
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
