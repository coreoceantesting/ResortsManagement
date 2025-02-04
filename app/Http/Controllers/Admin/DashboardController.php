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
        $approvedCouple = Booking::where('status', '1')
                            ->whereNotNull('couple_count')
                            ->sum('couple_count');

        $rejectedCouple = Booking::where('status', '2')
                            ->whereNotNull('couple_count')
                            ->sum('couple_count');

        $approvedGroup = Booking::where('status', '1')
                            ->whereNotNull('group_member')
                            ->count();
        $approvedGroupPeople = Booking::where('status', '1')
                            ->whereNotNull('group_member')
                            ->sum('group_member');

        $rejectedGroup = Booking::where('status', '2')
                            ->whereNotNull('group_member')
                            ->count();
        $rejectedGroupPeople = Booking::where('status', '2')
                            ->whereNotNull('group_member')
                            ->sum('group_member');

        $totalPeopleVisited = Couple::count() + Group::count();

        $maleEntry = Couple::where('gender', '2')->count() + Group::where('gender', '2')->count();

        $femaleEntry = Couple::where('gender', '1')->count() + Group::where('gender', '1')->count();

        return view('admin.dashboard', compact(
            'approvedCouple',
            'rejectedCouple',
            'approvedGroup',
            'rejectedGroup',
            'totalPeopleVisited',
            'maleEntry',
            'femaleEntry',
            'approvedGroupPeople',
            'rejectedGroupPeople'
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
