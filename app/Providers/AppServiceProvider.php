<?php

namespace App\Providers;

use App\View\Components\HomeCards;
use App\View\Components\ListDesign;
use App\View\Components\SearchBar;
use App\View\Components\ShowModal;
use App\View\Components\TableCards;
use App\View\Components\TitleAdmin;
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
        Blade::component('components.list-desing', ListDesign::class);
        Blade::component('components.title-admin', TitleAdmin::class);
        Blade::component('components.show-modal', ShowModal::class);
        Blade::component('components.search-bar', SearchBar::class);
        Paginator::useBootstrapFive();
        //
    }
}
