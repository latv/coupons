<?php

namespace Tet\Coupons\Providers;

use Illuminate\Support\ServiceProvider;

class CouponServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Load Routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        // 2. Load Views
        $this->loadViewsFrom(__DIR__ . '/../views', 'coupons');
    }

    public function register()
    {
    }
}