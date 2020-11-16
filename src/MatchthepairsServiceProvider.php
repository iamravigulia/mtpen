<?php

namespace edgewizz\matchthepairs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class MatchthepairsServiceProvider extends ServiceProvider{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        $this->app->make('Edgewizz\Matchthepairs\Controllers\MatchthepairsController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'matchthepairs');
        Blade::component('matchthepairs::mtp.open', 'mtp.open');
        Blade::component('matchthepairs::mtp.index', 'mtp.index');
    }
}