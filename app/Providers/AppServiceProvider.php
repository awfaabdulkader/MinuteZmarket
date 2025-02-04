<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void

    {
        Paginator::useBootstrapFive();

        Route::middleware('web')
        ->group(base_path('routes/web.php'));

        $locale = session('user_language', 'fr');
        App::setLocale($locale);
    }
}
