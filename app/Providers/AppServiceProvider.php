<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::composer(['tasks.all','tasks.today'],function ($view){
             return $view->with('users',User::query()
                 ->where('type','!=','admin')
                 ->orderBy('rank_id','asc')->get());
        });
    }
}
