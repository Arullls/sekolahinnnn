<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

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


        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        View::composer('components.sidebar', function ($view) {
            $menus = Menu::whereNull('parent_id')->where('active', true)->orderBy('order')->get();
            $view->with('menus', $menus);
        });
    }
}
