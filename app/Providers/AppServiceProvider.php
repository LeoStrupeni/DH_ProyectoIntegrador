<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::wherein('id',[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,56])->get();
        View::share('categorias', $categories);
    }
}
