<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Support\ServiceProvider;

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
        // Get the count of request
        $checkout = Cart::where('status', 'pending')->get();
        $request = count($checkout);

        view()->share('requests', $request);

        // Get the count of
        $stocks = Stock::where('quantity', '<=', 10)->get();
        $stock_alert = count($stocks);

        view()->share('stock_alert', $stock_alert);
    }
}
