<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function reports()
    {
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

        return view('admin.report.reports', compact('product_array', 'expenditures', 'revenues'));
    }

    public function generateToPdf()
    {


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
        $pdf = Pdf::loadView('admin.report.reports_to_pdf', compact('product_array', 'expenditures', 'revenues'));
        // download PDF file with download method
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->download('Coda Musical Store_' . date('F d, Y') . '.pdf');
    }
}
