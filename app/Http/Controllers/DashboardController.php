<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $pasienHariIni = Patient::whereDate('created_at', Carbon::today())
            ->where('handled_by_doctor', 1)
            ->count();

        $totalPasien = Patient::where('handled_by_doctor', 1)->count(); 

        return view('dashboard', compact('pasienHariIni', 'totalPasien'));
    }
}
