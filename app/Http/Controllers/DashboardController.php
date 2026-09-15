<?php

namespace App\Http\Controllers;

use App\Models\Pks;
use App\Models\Facilitator;
use App\Models\Trainer;
use App\Models\Module;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with live analytics from Supabase.
     */
    public function index()
    {
        // 1. Live counts queried directly from Supabase tables
        $totalPks         = Pks::count();
        $totalFacilitator = Facilitator::count();
        $totalTrainer     = Trainer::count();
        $totalModule      = Module::count();

        // 2. Fetch recent records for preview widgets
        $recentPks      = Pks::latest()->take(5)->get();
        $recentTrainers = Trainer::latest()->take(5)->get();

        // 3. Return data to your Blade view
        return view('admin.dashboard', compact(
            'totalPks',
            'totalFacilitator',
            'totalTrainer',
            'totalModule',
            'recentPks',
            'recentTrainers'
        ));
    }
}