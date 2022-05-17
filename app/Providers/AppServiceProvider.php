<?php

namespace App\Providers;

use Banners\Models\Banners;
use Blogs\Models\Blog;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Gallery\Models\Gallery;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use MainSettings\Models\MainSetting;
use Pages\Models\Page;
use Services\Models\Service;
use View;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

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
        Schema::defaultStringLength(191);
    }
}
