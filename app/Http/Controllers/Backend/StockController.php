<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function ManageStock()
    {
        $products = Product::with('category','brand')->latest()->get();
        return view('admin.stock.manage_stock',compact('products'));
    }
}
