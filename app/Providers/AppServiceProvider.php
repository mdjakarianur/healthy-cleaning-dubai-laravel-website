<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use File;
use View;
use App\Models\CompanyProfile;
use App\Models\ServiceCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $path = app_path('Interfaces');

        $files = File::allFiles($path);

        foreach($files as $file)
        {
            $file = pathinfo($file);
            $interfaces_name = $file['filename'];
            $interface = explode('Interface',$interfaces_name)[0];
            $this->app->bind("App\Interfaces\\{$interface}Interface","App\Repositories\\{$interface}Repository");
        }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*',function($view){
            $view->with('company',CompanyProfile::first());
            $view->with('categories',ServiceCategory::where('status',1)->with('services')->orderby('sl')->get());
        });
    }
}
