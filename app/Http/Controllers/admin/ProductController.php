<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.allProduct');
    }

    public function create()
    {
        // Fetch categories and subcategories for the dropdowns
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        // Return the view with categories and subcategories
        return view('admin.product.addProduct', compact('categories', 'subcategories'));
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_short_des' => 'required|string|max:255',
            'product_des' => 'required|string',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required|exists:categories,id',
            'product_subcategory_id' => 'nullable|exists:subcategories,id',
            'product_quantity' => 'required|integer',
            'product_img' => 'nullable|image',
            'slug' => 'nullable|string',
        ]);

        // Create a new product
        Product::create([
            'product_name' => $request->input('product_name'),
            'product_short_des' => $request->input('product_short_des'),
            'product_des' => $request->input('product_des'),
            'product_price' => $request->input('product_price'),
            'product_category_id' => $request->input('product_category_id'),
            'product_subcategory_id' => $request->input('product_subcategory_id'),
            'product_quantity' => $request->input('product_quantity'),
            'product_img' => $request->file('product_img') ? $request->file('product_img')->store('product_images') : null,
            'slug' => $request->input('slug'),
        ]);

        // Redirect with success message
        return redirect()->route('products.index')->with([
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        ]);
    }

   

    
    public function show(string $id)
    {
        //
    }

    
    // Show the edit form
    public function edit($id)
    {
        // Fetch the product to be edited
        $product = Product::findOrFail($id);
        
        // Fetch categories and subcategories for the dropdowns
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        // Pass the product and categories to the view
        return view('admin.product.editProduct', compact('product', 'categories', 'subcategories'));
    }

  
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
