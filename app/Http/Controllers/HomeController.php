<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\product;
class HomeController extends Controller
{
    
    public function index()
    {
        // Fetch the latest products and paginate them
        $products = Product::latest()->paginate(10); // This fetches 20 latest products per page
        return view('userTemp.home', compact('products')); // Pass the paginated products to the view
    }
    
}