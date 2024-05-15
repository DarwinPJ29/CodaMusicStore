<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $valid = $request->validated();
        if ($request->hasFile('file')) {
            $image = $valid['file'];
            $imageName = $image->hashName();
            Storage::disk('public')->put('products', $image);
            $valid['file'] = $imageName;
            Product::create($valid);
            return  redirect()->back()->with('create_product', 'success');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProductRequest $request, string $id)
    {
        $valid = $request->validated();
        $product = Product::find($id);

        if ($request->hasFile('file')) {
            unlink(public_path() . '/storage/products/' . $product->file);

            $image = $request->file;
            $imageName = $image->hashName();
            Storage::disk('public')->put('products', $image);
            $valid['file'] = $imageName;
            $product->update($valid);
            return  redirect()->back()->with('update_product', 'success');
        } else {
            $product->update($valid);
            return  redirect()->back()->with('update_product', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(string $id)
    {
        $product = Product::find($id);
        $product->archive = 1;
        $product->update();
        return  redirect()->back()->with('archive_product', 'success');
    }
    public function unarchive(string $id)
    {
        $product = Product::find($id);
        $product->archive = 0;
        $product->update();
        return  redirect()->back()->with('unarchive_product', 'success');
    }
}
