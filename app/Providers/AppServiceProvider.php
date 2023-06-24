<?php

namespace App\Providers;

use App\Models\Logo;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $activeLogo = Logo::where('is_active', true)->first();
            $view->with('activeLogo', $activeLogo);
        });
    }
}
