<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{

    public function index()
    {

        $deliveries = Delivery::orderBy('id', 'DESC')->get();
        foreach ($deliveries as  $value) {
            $product = Product::find($value->product_id);
            $value->code = $product->code;
        }
        return view('admin.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('archive', 0)->get();
        return view('admin.delivery.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'product_id' => 'required',
            'price_bundle' => 'required',
            'quantity_bundle' => 'required',
            'amount_bundle' => 'required',
        ]);

        $product = Stock::where('product_id', $valid['product_id'])->exists();
        if ($product) {
            // Product Stocks Existed
            $stock = Stock::where('product_id', $valid['product_id'])->first();

            $stock->quantity += $valid['quantity_bundle'];
            $stock->update();
        } else {
            // Product Stocks not Existed
            Stock::create([
                'product_id' => $valid['product_id'],
                'quantity' => $valid['quantity_bundle'],
            ]);
        }

        Delivery::create($valid);
        return back()->with('delivery_inserted', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
