<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $uniqueVisitors = Visit::distinct('ip_address')->count();

        $dailyVisits = Visit::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        $mostVisitedPages = Visit::selectRaw('page, COUNT(*) as count')
            ->groupBy('page')
            ->orderBy('count', 'desc')
            ->get();

        return view('dashboard.admin', [
            'uniqueVisitors' => $uniqueVisitors,
            'dailyVisits' => $dailyVisits,
            'mostVisitedPages' => $mostVisitedPages,
        ]);
    }
}
