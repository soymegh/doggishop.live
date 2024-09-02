<?php

namespace App\Providers;

use App\View\Components\HomeCards;
use App\View\Components\TableCards;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Blade::component('components.home-cards', HomeCards::class);
        Blade::component('components.table-cards', TableCards::class);
        Paginator::useBootstrapFive();
        //
    }
}
