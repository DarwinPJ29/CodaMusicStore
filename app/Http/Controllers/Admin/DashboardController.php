<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $stocks = Stock::where('quantity', '<=', 10)->get();
        foreach ($stocks as $value) {
            $product = Product::find($value->product_id);
            $value->code = $product->code;
            $value->name = $product->name;
        }



        $carts = Cart::where('status', 'receive')
            ->orWhere('status', 'completed')->get();
        $product_array = [];

        foreach ($carts as  $value) {
            if (array_key_exists($value->product_id, $product_array)) {
                // Update the quantity
                $quantity = $product_array[$value->product_id]->quantity + $value->quantity;
                $product_array[$value->product_id]->quantity = $quantity;
            } else {

                // Merge the cart info to product info
                $product = $value->product;
                $value->price = $product->price;
                $value->code = $product->code;
                $value->category = $product->category;
                $value->name = $product->name;
                $product_array[$value->product_id] = $value;
            }
        }

        $expenditures = 0;
        $revenues = 0;
        foreach ($product_array as  $value) {
            //Compute for the amount and amount bundle
            $value->amount = $value->quantity * $value->price;
            $product = $value->product;
            $value->amount_bundle = $product->deliverys->sum('amount_bundle');
            $expenditures += $value->amount_bundle;
            $revenues += $value->amount;
        }


        return view('admin.dashboard', compact('stocks',  'expenditures', 'revenues'));
    }
}
