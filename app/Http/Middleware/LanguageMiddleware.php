<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check URL parameter first
        $languageCode = $request->route('languageCode');
 // If no URL parameter, check session
        if (!$languageCode) {
            $languageCode = session('user_language', 'fr');
        }
        
        // Validate language code
        if (!in_array($languageCode, ['fr', 'en', 'es'])) {
            $languageCode = 'fr';
        }
        
        // Store in session
        session(['user_language' => $languageCode]);
        
        App::setLocale($languageCode);

        // Share language code with all views
        view()->share('languageCode', $languageCode);
        
        
        
        return $next($request);   
    
    }
}
