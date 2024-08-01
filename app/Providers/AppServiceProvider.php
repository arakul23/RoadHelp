<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LiqPay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(LiqPay::class, function () {
            return new LiqPay(config('liqpay.public_token'), config('liqpay.private_token'));
        });
    }
}
