<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function showRequest()
    {

        $reqs = Cart::where('status', 'pending')->get();
        foreach ($reqs as  $value) {
            // Get the user details
            $user = $value->user;
            $value->name = $user->name;
            $value->contact = $user->contact;
            $value->address = $user->address;
            $value->email = $user->email;

            // Get the product details
            $product = $value->product;
            $value->product_name = $product->name;
            $value->product_code = $product->code;
            $value->product_price = $product->price;
        }

        return view('admin.receipt.tabs.requests', compact('reqs'));
    }

    public function receiveReceipts(String $id)
    {

        $cart = Cart::find($id);
        $cart->status = 'receive';
        $cart->update();
        return back()->with('to_received', 'Success');
    }
    public function declineReceipts(String $id)
    {
        $cart = Cart::find($id);
        $cart->status = 'declined';
        $cart->update();

        $product = $cart->product;
        $stocks = $product->stocks;
        $stocks->quantity = $stocks->quantity + $cart->quantity;
        $stocks->update();
        return back()->with('to_declined', 'Success');
    }

    public function showDeclined()
    {

        $reqs = Cart::where('status', 'declined')->get();
        foreach ($reqs as  $value) {
            // Get the user details
            $user = $value->user;
            $value->name = $user->name;
            $value->contact = $user->contact;
            $value->address = $user->address;
            $value->email = $user->email;

            // Get the product details
            $product = $value->product;
            $value->product_name = $product->name;
            $value->product_code = $product->code;
            $value->product_price = $product->price;
        }

        return view('admin.receipt.tabs.decline', compact('reqs'));
    }

    public function showReceived()
    {

        $reqs = Cart::where('status', 'receive')->get();
        foreach ($reqs as  $value) {
            // Get the user details
            $user = $value->user;
            $value->name = $user->name;
            $value->contact = $user->contact;
            $value->address = $user->address;
            $value->email = $user->email;

            // Get the product details
            $product = $value->product;
            $value->product_name = $product->name;
            $value->product_code = $product->code;
            $value->product_price = $product->price;
        }

        return view('admin.receipt.tabs.receive', compact('reqs'));
    }
    public function showCompleted()
    {

        $reqs = Cart::where('status', 'completed')->get();
        foreach ($reqs as  $value) {
            // Get the user details
            $user = $value->user;
            $value->name = $user->name;
            $value->contact = $user->contact;
            $value->address = $user->address;
            $value->email = $user->email;

            // Get the product details
            $product = $value->product;
            $value->product_name = $product->name;
            $value->product_code = $product->code;
            $value->product_price = $product->price;
        }

        return view('admin.receipt.tabs.complete', compact('reqs'));
    }
}
