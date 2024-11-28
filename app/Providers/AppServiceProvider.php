<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Languague;
use Illuminate\Pagination\Paginator;
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
        Paginator::useTailwind();

        // Truyền dữ liêu ra view
        // Truyền addresses ra view frontendHeader
        View::composer('partials.frontendFooter',  function($view){
            $view->with('addresses', Address::all());
        });

        // Truyền ngôn ngữ ra view frontendHeader
        View::composer('partials.frontendHeader',  function($view){
            $view->with('languages', Languague::all());

        });
    }
}
