<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;


class PaymentHistoryController extends Controller
{
    public function checkoutHistory(Request $request)
    {
        $this->authorize('only-user');
        $user = User::find(auth()->user()->id);
        $carts = $user->carts->where('checkout', 1)
            ->where('status', 'pending');
        foreach ($carts as $key => $value) {
            $product = Product::find($value->product_id);
            $value['file'] = $product->file;
            $value['name'] = $product->name;
            $value['price'] = $product->price;
            $value['amount'] = $product->price * $value->quantity;
        }
        return view('website.history.tabs.checkout', compact('carts',));
    }
    public function toReceive(Request $request)
    {
        $this->authorize('only-user');
        $user = User::find(auth()->user()->id);

        if ($request->isMethod('get')) {
            $carts = $user->carts->where('checkout', 1)
                ->where('status', 'receive');
            foreach ($carts as $key => $value) {
                $product = Product::find($value->product_id);
                $value['file'] = $product->file;
                $value['name'] = $product->name;
                $value['price'] = $product->price;
                $value['amount'] = $product->price * $value->quantity;
            }
            return view('website.history.tabs.to_receive', compact('carts',));
        }

        $cart = Cart::find($request->input('id'));
        $cart->status = 'completed';
        $cart->update();
        return redirect()->route('completed')->with('completed', 'Success');
    }
    public function completed(Request $request)
    {
        $this->authorize('only-user');
        $user = User::find(auth()->user()->id);
        $carts = $user->carts->where('checkout', 1)
            ->where('status', 'completed');
        foreach ($carts as $key => $value) {
            $product = Product::find($value->product_id);
            $value['file'] = $product->file;
            $value['name'] = $product->name;
            $value['price'] = $product->price;
            $value['amount'] = $product->price * $value->quantity;
        }

        return view('website.history.tabs.completed', compact('carts',));
    }
    public function declined(Request $request)
    {
        $this->authorize('only-user');
        $user = User::find(auth()->user()->id);
        $carts = $user->carts->where('checkout', 1)
            ->where('status', 'declined');
        foreach ($carts as $key => $value) {
            $product = Product::find($value->product_id);
            $value['file'] = $product->file;
            $value['name'] = $product->name;
            $value['price'] = $product->price;
            $value['amount'] = $product->price * $value->quantity;
        }

        return view('website.history.tabs.declined', compact('carts',));
    }
}
