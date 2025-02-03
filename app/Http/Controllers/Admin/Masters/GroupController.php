<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
       return view('admin.masters.group')->with('showSidebar', false);
    }


    public function create()
    {

    }


    public function storeGroup(Request $request)
    {
        $groupmemberCount = $request->input('group_member');

        // Validate the data
        $request->validate([
           'bdate' => 'required|date',
            'group_member' => 'required|integer|min:1|max:10',
            'customername' => 'required',
            'fname' => 'required|array|min:' . ($groupmemberCount ),
            'lname' => 'required|array|min:' . ($groupmemberCount ),
            'mobile' => 'required|array|min:' . ($groupmemberCount ),
            'gender' => 'required|array|min:' . ($groupmemberCount ),
           'document' => ['required','array','min:'.($groupmemberCount > 2 ? 2 : $groupmemberCount),'max:' . ($groupmemberCount > 2 ? 2 : $groupmemberCount)],
        ]);
        $messages = [
            'customername.required' => 'Customer name is required.',
            'fname.*.required' => 'First name is required for each entry.',
            'lname.*.required' => 'Last name is required for each entry.',
            'mobile.*.required' => 'Mobile number is required for each entry.',
            'mobile.digits' => 'The mobile number must be exactly 10 digits.',
            'gender.*.required' => 'Gender is required for each entry.',
            'document.*.required' => 'Adhar card is required for each entry.',
        ];

        // Store the booking data
        $booking = Booking::create([
            'booking_date' => $request->bdate,
            'group_member' => $request->group_member,
            'customername' => $request->customername,
        ]);

        // Store the group data
        foreach ($request->fname as $index => $firstName) {
            $customer = new Group();
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


        return response()->json(['success' => 'Group booking successfully created']);
    }



}
