<?php

namespace App\Http\Controllers;

use App\Models\Pks;
use App\Models\Facilitator;
use App\Models\Trainer;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Fetch Real-time Counts (Ordered: PKS -> Fasilitator -> Jurulatih -> Modul)
        $totalPks          = Pks::count();
        $totalFacilitators = Facilitator::count();
        $totalTrainers     = Trainer::count();
        $totalModules      = Module::count();

        // 2. Fetch Latest Activity
        $recentModules      = Module::with('trainer')->latest()->take(5)->get();
        $recentTrainers     = Trainer::latest()->take(5)->get();
        $recentFacilitators = Facilitator::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPks',
            'totalFacilitators',
            'totalTrainers',
            'totalModules',
            'recentModules',
            'recentTrainers',
            'recentFacilitators'
        ));
    }
}