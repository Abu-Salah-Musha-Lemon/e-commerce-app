<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
// use for string conversion
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {    $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $products = Product::latest()->get(); // Assuming you have a Product model
    
        return view('admin.product.allProduct', compact('categories', 'subcategories', 'products'));
    }

    public function create()
    {
        // Fetch categories and subcategories for the dropdowns
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        // $categories = Category::all();
        // $subcategories = Subcategory::all();
        
        // Return the view with categories and subcategories
        return view('admin.product.addProduct', compact('categories', 'subcategories'));
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        // Validate the incoming request
    $request->validate([
        'product_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        'product_name' => 'required|string|max:255',
        'product_short_des' => 'nullable|string|max:500',
        'product_des' => 'nullable|string',
        'product_price' => 'required|numeric',
        'product_category_id' => 'required|exists:categories,id',
        'product_subcategory_id' => 'required|exists:subcategories,id',
        'product_quantity' => 'required|integer|min:1',
    ]);

    // Handle the image upload
    $image = $request->file('product_img');
    $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    // Move the image to the public 'upload' directory
    $image->move(public_path('products'), $img_name);

    // Generate the URL or path to the image
    $img_url = 'products/'.$img_name;

    // Create the product
    Product::create([
        'product_name' => $request->input('product_name'),
        'product_short_des' => $request->input('product_short_des'),
        'product_des' => $request->input('product_des'),
        'product_price' => $request->input('product_price'),
        'product_category_id' => $request->input('product_category_id'),
        'product_subcategory_id' => $request->input('product_subcategory_id'),
        'product_quantity' => $request->input('product_quantity'),
        'product_img' => $img_name, // Ensure consistency here
        'slug' => strtolower(str_replace(' ', '-', $request->input('product_name')))
    ]);
        // Redirect with success message
        return redirect()->route('product')->with([
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
          // Step 1: Validate the request
          $request->validate([
            'product_name' => 'required|string|max:255',
            'product_short_des' => 'required|string|max:255',
            'product_des' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'product_category_id' => 'required|exists:categories,id',
            'product_subcategory_id' => 'nullable|exists:subcategories,id',
            'slug' => 'nullable|string|max:255',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating image upload
        ]);

        // Step 2: Find the product
        $product = Product::findOrFail($id);

        // Step 3: Update product details
        $product->product_name = $request->product_name;
        $product->product_short_des = $request->product_short_des;
        $product->product_des = $request->product_des;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_category_id = $request->product_category_id;
        $product->product_subcategory_id = $request->product_subcategory_id;
        $product->slug = $request->slug;

        // Step 4: Handle the file upload
        if ($request->hasFile('product_img')) {
            // Delete the old image if exists
            if ($product->product_img) {
                Storage::delete('public/products/' . $product->product_img);
            }

            // Store the new image and set the product_img path
            $imagePath = $request->file('product_img')->store('products', 'public');
            $product->product_img = $imagePath;
        }

        // Save the updated product
        $product->save();

        // Step 5: Redirect or respond
        return redirect()->route('product')->with('success', 'Product updated successfully.');
    }
    
    public function destroy(string $id)
    {
        // Step 1: Find the product by ID
        $product = Product::findOrFail($id);

        // Step 2: Delete the product image if it exists
        if ($product->product_img) {
            // Construct the full path to the image
            $imagePath = 'public/products/' . $product->product_img;

            // Check if the file exists before deleting
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            } else {
                // Optionally log an error or message if the file doesn't exist
                \Log::warning("Image not found for product ID {$id}: {$imagePath}");
            }
        }

        // Step 3: Delete the product record
        $product->delete();

        // Step 4: Redirect with success message
        return redirect()->route('product')->with('success', 'Product deleted successfully.');
    

    }
}
