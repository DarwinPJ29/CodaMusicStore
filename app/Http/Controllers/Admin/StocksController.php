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
        $customers = User::where('role', 0)->get();
        return view('admin.customers', compact('customers'));
    }
    public function activate(string $id)
    {
        $user = User::find($id);
        $user->activated = 1;
        $user->update();
        return  redirect()->back()->with('activate_user', 'success');
    }
    public function deactivate(string $id)
    {
        $user = User::find($id);
        $user->activated = 0;
        $user->update();
        return  redirect()->back()->with('deactivate_user', 'success');
    }
}
