<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//  объект запроса $query, в котором много полезных свойств
//        DB::listen(function ($query) {
////            dump($query); // весь объект
//            dump($query->sql); // строка sql  запроса
////            dump($query->bindings); // приклепленные параметры "?"
//        });
    }
}
