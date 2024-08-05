<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\product;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
   
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $product = product::where('product_category_id',$id)->latest()->get();
        return view('userTemp.categoryPage',compact('category','product'));
    }

     public function singleProduct($id) {
        try {
            // Fetch the specific product by ID
            $product = Product::findOrFail($id);
    
            // Fetch related products based on the subcategory of the current product
            $relatedProducts = Product::where('product_subcategory_id', $product->product_subcategory_id)
                                      ->where('id', '!=', $product->id) // Exclude the current product
                                      ->get();
    
            // Fetch categories and subcategories for the view
            $category = Category::all();
            $subcategory = SubCategory::all();
            
            return view('userTemp.singleProduct', compact('product', 'category', 'subcategory', 'relatedProducts'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where no product is found
            return redirect()->route('errorPage')->with('error', 'Product not found');
        }
    }
    
    public function addToCart(){
        $user_id = Auth::id();
        $items = Card::where('user_id',$user_id)->get();
        return view('userTemp.addToCard',compact('items'));
    }

    public function addProductToCart(Request $request, $id) {
        $product_qty = Product::where('id', $id)->value('product_quantity');
        $requested_qty = $request->input('quantity');
    
        if ($requested_qty > $product_qty) {
            // Redirect back with an error message
            return redirect()->back()->with([
                'message' => 'Product quantity exceeds the stock available.',
                'alert-type' => 'error'
            ]);
        }
        // echo '<pre>';
        // echo '<pre>';
        $product_qty = $request->input('product_qty');
        $product_price = $request->input('product_price');
        $product_new_price = $product_qty * $product_price;
        // echo $product_new_price;exit;

        Card::create([
            'user_id'=>Auth::id(),
            'product_id'=>$request->product_id,
            'product_quantity'=>$request->product_qty,
            'product_price'=>$product_new_price,
        ]);
    
        // Proceed with adding the product to the cart
        // Your cart logic here
    
        return redirect()->back()->with([
            'message' => 'Product added to cart successfully!',
            'alert-type' => 'success'
        ]);
    }
    public function checkout(){
        return view('userTemp.checkOut');
    }

    public function userProfile(){
        return view('userTemp.userProfile');
    }
    public function pendingOrder(){
        return view('userTemp.pendingOrder');
    }
    public function userHistory(){
        return view('userTemp.userHistory');
    }

    public function newRelease(){
    return view('userTemp.newRelease');
    }

    public function todaysDeal(){
    return view('userTemp.todaysDeal');
    }

    public function customerService(){
    return view('userTemp.customerService');
    }




}
