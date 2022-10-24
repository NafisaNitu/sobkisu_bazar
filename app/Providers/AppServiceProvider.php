<?php

namespace App\Providers;

use App\Helpers\Category\Category;
use App\Helpers\SubCategory\SubCategory;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Interfaces\CrudInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CategoryController::class)
            ->needs(CrudInterface::class)
            ->give(Category::class);

        $this->app->when(SubCategoryController::class)
            ->needs(CrudInterface::class)
            ->give(SubCategory::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
