<?

// app/Http/Middleware/LogPageVisits.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class LogPageVisits
{
    public function handle(Request $request, Closure $next)
    {
        // Get the user's IP address
        $ipAddress = $request->ip();

        // Get the current page URL
        $pageUrl = $request->fullUrl();

        // Check if the user has already visited the page from the same IP
        $hasVisited = Visit::where('ip_address', $ipAddress)
            ->where('page', $pageUrl)
            ->exists();

        // If the user has not visited the page from the same IP, log the visit
        if (!$hasVisited) {
            Visit::create([
                'ip_address' => $ipAddress,
                'page' => $pageUrl,
            ]);
        }

        return $next($request);
    }
}
