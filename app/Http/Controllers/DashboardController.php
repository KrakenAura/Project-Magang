<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //Statistik Berita
        $categories = Berita::distinct('category')->pluck('category')->toArray();

        $popularNews = [];

        foreach ($categories as $category) {
            $popularNews[$category] = Berita::select('beritas.id', 'beritas.title', 'beritas.author', 'beritas.image', DB::raw('COUNT(page_views.id) as views'))
                ->join('page_views', 'beritas.id', '=', DB::raw('REPLACE(page_views.page, "/berita/", "")'))
                ->where('beritas.category', $category)
                ->groupBy('beritas.id', 'beritas.title', 'beritas.author', 'beritas.image')
                ->orderByDesc('views')
                ->take(4)
                ->get();
        }

        // Statistik Halaman
        $todayPageViews = DB::table('page_views')
            ->whereDate('view_date', today())
            ->where('page', 'not like', '/berita/%') // Exclude '/berita/{id}' routes
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();

        $lastWeekPageViews = DB::table('page_views')
            ->whereBetween(
                'view_date',
                [now()->subWeek(), now()]
            )
            ->where('page', 'not like', '/berita/%') // Exclude '/berita/{id}' routes
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();

        $lastMonthPageViews = DB::table('page_views')
            ->whereBetween(
                'view_date',
                [now()->subMonth(), now()]
            )
            ->where('page', 'not like', '/berita/%') // Exclude '/berita/{id}' routes
            ->select('page', DB::raw('COUNT(*) as total_views'))
            ->groupBy('page')
            ->get();

        return view('dashboard.admin', compact('todayPageViews', 'lastWeekPageViews', 'lastMonthPageViews', 'popularNews', 'categories'));
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
