<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\product;
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

return view('userTemp.singlePage');
    }
    public function checkout(){
return view('userTemp.checkOut');
    }
    public function userProfile(){
return view('userTemp.userProfile');
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
