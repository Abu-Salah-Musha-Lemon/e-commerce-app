<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Import DB facade

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $products = Product::latest()->get();
     
        return view('admin.product.allProduct', compact('categories', 'subcategories', 'products'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        
        return view('admin.product.addProduct', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:255',
            'product_short_des' => 'nullable|string|max:500',
            'product_des' => 'nullable|string',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required|exists:categories,id',
            'product_subcategory_id' => 'required|exists:subcategories,id',
            'product_quantity' => 'required|integer|min:1',
        ]);

        $img_name = hexdec(uniqid()) . '.' . $request->file('product_img')->getClientOriginalExtension();
        $request->file('product_img')->move(public_path('products'), $img_name);

        $success = Product::create([
            'product_name' => $request->input('product_name'),
            'product_short_des' => $request->input('product_short_des'),
            'product_des' => $request->input('product_des'),
            'product_price' => $request->input('product_price'),
            'product_category_id' => $request->input('product_category_id'),
            'product_subcategory_id' => $request->input('product_subcategory_id'),
            'product_quantity' => $request->input('product_quantity'),
            'product_img' => $img_name,
            'slug' => strtolower(str_replace(' ', '-', $request->input('product_name')))
        ]);

        if ($success) {
            // Update product count
            Category::where('id', $request->input('product_category_id'))->increment('product_count', 1);
            Subcategory::where('id', $request->input('product_subcategory_id'))->increment('product_count', 1);

            $notification = array(
                'message' => 'Product created successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('product')->with($notification);
        } else {
            $notification = array(
                'message' => 'Product could not be created.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        return view('admin.product.editProduct', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_short_des' => 'required|string|max:255',
            'product_des' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'product_category_id' => 'required|exists:categories,id',
            'product_subcategory_id' => 'nullable|exists:subcategories,id',
            'slug' => 'nullable|string|max:255',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($request->except('product_img'));

        $success = true;

        if ($request->hasFile('product_img')) {
            // Delete old image if it exists
            if ($product->product_img) {
                $oldImagePath = public_path('products/' . $product->product_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            // Store the new image
            $img_name = hexdec(uniqid()) . '.' . $request->file('product_img')->getClientOriginalExtension();
            $request->file('product_img')->move(public_path('products'), $img_name);
            $product->product_img = $img_name;
        }

        $success = $product->save();

        if ($success) {
            $notification = array(
                'message' => 'Product updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('product')->with($notification);
        } else {
            $notification = array(
                'message' => 'Product could not be updated.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        
        // Decrement product count
        Category::where('id', $product->product_category_id)->decrement('product_count', 1);
        Subcategory::where('id', $product->product_subcategory_id)->decrement('product_count', 1);

        // Delete the product image
        if ($product->product_img) {
            $imagePath = public_path('products/' . $product->product_img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        $notification = array(
            'message' => 'Product delete successfully! .',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
