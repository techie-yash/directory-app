<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BusinessCategory;


class FooterCategoriesServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        view()->composer('include.ui-footer', function ($view) {
            $categories = BusinessCategory::all()->whereNull('parent_id');
            $view->with('categories', $categories);
        });
    
    }
}
