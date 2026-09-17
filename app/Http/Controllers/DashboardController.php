<?php

namespace App\Http\Controllers;

use App\Models\Pks;
use App\Models\Facilitator;
use App\Models\Trainer;
use App\Models\Module;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 0. Ensure only admins can access the admin dashboard
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // 1. Query dynamic record counts directly from Supabase
        $totalPks         = Pks::count();
        $totalFacilitator = Facilitator::count();
        $totalTrainer     = Trainer::count();
        $totalModule      = Module::count();

        // 2. Fetch live recent records
        $recentModules    = Module::latest()->take(5)->get();
        $recentFacilitators = Facilitator::latest()->take(5)->get();
        $recentTrainers   = Trainer::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPks',
            'totalFacilitator',
            'totalTrainer',
            'totalModule',
            'recentModules',
            'recentFacilitators',
            'recentTrainers'
        ));
    }
}