<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
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
            'fname' => 'required|array|min:' . ($groupmemberCount ),
            'lname' => 'required|array|min:' . ($groupmemberCount ),
            'mobile' => 'required|array|min:' . ($groupmemberCount ),
            'gender' => 'required|array|min:' . ($groupmemberCount ),
           'document' => ['required','array','min:2','max:' . ($groupmemberCount > 2 ? 2 : $groupmemberCount)],
           
        ]);

        // Store the booking data
        $booking = Booking::create([
            'booking_date' => $request->bdate,
            'group_member' => $request->group_member,
        ]);

        // Store the group data
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


        return response()->json(['success' => 'Group booking successfully created']);
    }

   
    public function show(string $id)
    {
       
    }

    
    public function edit(string $id)
    {
       
    }

   
    public function update(Request $request, string $id)
    {
       
    }

   
    public function destroy(string $id)
    {
       
    }
}
