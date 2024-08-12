<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $todayPageViews = DB::table('page_views')
            ->whereDate('view_date', today())
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();

        $lastWeekPageViews = DB::table('page_views')
            ->whereBetween('view_date', [now()->subWeek(), now()])
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();

        $lastMonthPageViews = DB::table('page_views')
            ->whereBetween('view_date', [now()->subMonth(), now()])
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();




        return view('dashboard.admin', compact('todayPageViews', 'lastWeekPageViews', 'lastMonthPageViews'));
    }
    public function trackPageView(Request $request)
    {
        $pagePath = $request->input('page');
        $pageViews = $request->input('pageViews');

        $records = [];

        for ($i = 0; $i < $pageViews; $i++) {
            $records[] = [
                'page' => $pagePath,
                'view_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert all records at once
        DB::table('page_views')->insert($records);

        return response()->json(['success' => true]);
    }
}
