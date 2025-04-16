<?php


namespace App\Providers;


use App\Libs\RateLimiting as Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot(): void
    {
        $this->webhookRoutes();

    }

    protected function webhookRoutes()
    {
        Route::prefix('webhook')
            ->middleware('webhook')
            ->namespace($this->namespace . '\Webhook')
            ->as('webhook.')
            ->group(base_path('routes/webhook.php'));
    }
}
