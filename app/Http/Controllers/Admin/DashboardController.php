<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Couple;
use App\Models\Group;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{

    public function index()
    {
        
        // Count approved couples
        $approvedCouple = Booking::where('status', '1')
                        ->whereNotNull('couple_count')
                        ->count();

        // Count rejected couples
        $rejectedCouple = Booking::where('status', '2')
                            ->whereNotNull('couple_count') 
                            ->count();

        // Count approved groups
        $approvedGroup = Booking::where('status', '1')
                        ->whereNotNull('group_member') 
                        ->count();

        // Count rejected groups
        $rejectedGroup = Booking::where('status', '2')
                        ->whereNotNull('group_member')
                        ->count();

        // Count total people visited (couples + group members)
        $totalPeopleVisited = Couple::count() + Group::count();

        // Count male entries
        $maleEntry = Couple::where('gender', '2')->count() + Group::where('gender', '2')->count();

        // Count female entries
        $femaleEntry = Couple::where('gender', '1')->count() + Group::where('gender', '1')->count();

        return view('admin.dashboard', compact(
            'approvedCouple',
            'rejectedCouple',
            'approvedGroup',
            'rejectedGroup',
            'totalPeopleVisited',
            'maleEntry',
            'femaleEntry'
        ));
    
    }

    public function changeThemeMode()
    {
        $mode = request()->cookie('theme-mode');

        if($mode == 'dark')
            Cookie::queue('theme-mode', 'light', 43800);
        else
            Cookie::queue('theme-mode', 'dark', 43800);

        return true;
    }
}
