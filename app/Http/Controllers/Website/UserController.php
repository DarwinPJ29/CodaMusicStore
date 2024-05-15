<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function viewProduct(String $id)
    {
        $product = Product::find($id);

        $relateds = Product::where('category', $product->category)
            ->where('archive', '0')
            ->where('id', '!=', $product->id)
            ->get();

        $exist = Stock::where('product_id', $product->id)->exists();
        if ($exist) {
            $stocks = Stock::where('product_id', $product->id)->first();
            $product->stocks = $stocks->quantity;
        } else {
            $product->stocks = '0';
        }


        return view('website.view_product', compact('product', 'relateds'));
    }

    public function showCart(Request $request)
    {
        $this->authorize('only-user');
        $user = User::find(auth()->user()->id);
        $carts = $user->carts->where('checkout', 0);
        $total = 0;
        foreach ($carts as $key => $value) {

            $product = Product::find($value->product_id);
            $value['file'] = $product->file;
            $value['name'] = $product->name;
            $value['price'] = $product->price;
            $value['amount'] = $product->price * $value->quantity;
            $total += $value['amount'];
            $stocks = Stock::where('product_id', $value->product_id)->first();
            $value->stocks = $stocks->quantity;
        }

        return view('website.cart', compact('carts', 'total'));
    }

    public function addToCart(Request $request, String $id)
    {


        if (!auth()->check()) {
            return redirect()->route('signin');
        }

        $this->authorize('only-user');

        $product = Product::find($id);
        $in_cart = Cart::where('product_id', $product->id)->where('checkout', 0)->exists();

        if ($in_cart) {
            return back()->with('cart_exist', 'succes');
        }

        $stocks = $product->stocks;

        if ($stocks === null) {
            return back()->with('low_stocks', 'succes');
        }

        if ($stocks->quantity ==  0) {
            return back()->with('low_stocks', 'succes');
        }

        $data  = [
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => $request->input('quantity'),
        ];

        Cart::create($data);

        return back()->with('cart_added', 'succes');
    }

    public function updateQuantity(Request $request, String $id)
    {
        $this->authorize('only-user');
        $cart = Cart::find($id);
        $cart->quantity = $request->input('quantity');
        $cart->update();
        return back()->with('cart_updated', 'succes');
    }

    public function removeProduct(String $id)
    {
        $this->authorize('only-user');
        Cart::destroy($id);
        return back()->with('cart_remove', 'succes');
    }

    public function checkout(Request $request, $id)
    {
        $cart = Cart::find($id);
        if ($request->isMethod('get')) {
            $product = $cart->product;
            $cart->name = $product->name;
            $cart->total = $product->price * $cart->quantity;
            return view('website.checkout', compact('cart'));
        }



        $valid = $request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ], [
            'file' => 'Please upload image with extension of jpg, png or jpeg',
        ]);


        if ($request->hasFile('file')) {

            $image = $valid['file'];
            $imageName = $image->hashName();
            Storage::disk('public')->put('receipts', $image);
            $valid['file'] = $imageName;
            $cart->checkout = 1;
            $cart->file = $valid['file'];
            $cart->status = 'pending';
            $cart->update();

            $product = $cart->product;
            $stocks = $product->stocks;
            $stocks->quantity = $stocks->quantity - $cart->quantity;
            $stocks->update();

            return  redirect()->route('checkoutHistory')->with('checkout', 'success');
        }
    }

    public function category(String $id)
    {
        $products = Product::where('archive', '0')->where('category', $id)->get();
        foreach ($products as  $value) {
            $exist = Stock::where('product_id', $value->id)->exists();
            if ($exist) {
                $stocks = Stock::where('product_id', $value->id)->first();
                $value->stocks = $stocks->quantity;
            } else {
                $value->stocks = 0;
            }
        }
        $category = $id;

        return view('website.category', compact('products', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('archive', '0')->where('name', 'LIKE', "%{$search}%")->get();
        foreach ($products as  $value) {
            $exist = Stock::where('product_id', $value->id)->exists();
            if ($exist) {
                $stocks = Stock::where('product_id', $value->id)->first();
                $value->stocks = $stocks->quantity;
            } else {
                $value->stocks = 0;
            }
        }
        $category = $search;

        return view('website.category', compact('products', 'category'));
    }
}
