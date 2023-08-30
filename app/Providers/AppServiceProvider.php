<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(App\Services\Contracts\Parser::class, app\Services\ParserService::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
     Paginator::useBootstrapFive();
    }
}
