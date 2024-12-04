<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Field;
use App\Models\Languague;
use App\Models\Product;
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
            $view->with('footerProducts', Product::all());
        });

        // Truyền ngôn ngữ, lĩnh vực kinh doanh, dòng sản phẩm ra view frontendHeader
        View::composer('partials.frontendHeader',  function($view){
            $view->with('languages', Languague::all());
            $view->with('menuFields', Field::all());
            $view->with('menuProducts', Product::all());
        });

        View::composer('front.common.contactMe', function($view){
            $view->with('addresses', Address::all());
        });
    }
}
