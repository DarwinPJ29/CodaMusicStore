<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        foreach ($stocks as $value) {
            $product = Product::find($value->product_id);
            $value->code = $product->code;
            $value->name = $product->name;
        }

        return view('admin.stocks', compact('stocks'));
    }

    public function customers()
    {
        $customers = User::where('activated', 1)->where('role', 0)->get();
        return view('admin.customers', compact('customers'));
    }
}
