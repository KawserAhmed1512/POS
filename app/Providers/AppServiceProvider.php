<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

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
        Paginator::useBootstrap();

        $all_categories=Category::all();
        view()->share('categories',$all_categories);
    }
}    
