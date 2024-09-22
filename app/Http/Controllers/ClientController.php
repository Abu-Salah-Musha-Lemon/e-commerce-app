<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\product;
use App\Models\Card;
use App\Models\order;
use App\Models\shopping_addresses;
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
        $product_name =Product::all();
        return view('userTemp.addToCard',compact('items','product_name'));
    }
    public function deleteProductToCart($id){
        $delete = Card::where('id',$id)->delete();
        return redirect()->back()->with([
            'message' => 'Product Delete successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function addProductToCart(Request $request, $id) {
        $product_qty = Product::where('id', $id)->value('product_quantity');
        
        $requested_input_qty = $request->input('product_quantity',1);
        
        if ($requested_input_qty > $product_qty) {
            // Redirect back with an error message
            return redirect()->back()->with([
                'message' => 'Product quantity exceeds the stock available.',
                'alert-type' => 'error'
            ]);
        }
        $product_price = Product::where('id', $id)->value('product_price');
 
        $product_new_price = $requested_input_qty * $product_price;

       $c =  Card::create([
            'user_id'=>Auth::id(),
            'product_id'=>$id,
            'product_qty'=>$requested_input_qty,
            'product_price'=>$product_new_price
        ]);
    
        return redirect()->back()->with([
            'message' => 'Product added to cart successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function shoppingAddress(Request $request){
        $request->validate([
            'phoneNumber' => 'required|string|max:15',
            'presentAddress' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10',
        ]);

    shopping_addresses::create([
            'phoneNumber'=>$request->phoneNumber,
            'presentAddress'=>$request->presentAddress,
            'postalCode'=>$request->postalCode,
            'userId'=>Auth::id(),
        ]);

        return redirect()->route('checkOut')->with([
            'message' => 'user Address add  successfully!',
            'alert-type' => 'success'
        ]);
    }
    public function checkout(){
        $user_id=Auth::id();
        $shippingAddress=shopping_addresses::where('userId',$user_id)->get();
        $card=Card::where('user_id',$user_id)->get();
        $products=Card::where('user_id',$user_id)->get();
        return view('userTemp.checkOut',compact('shippingAddress','products'));
    }


    public function orderStore()
    {
        $user_id=Auth::id();
        $shippingAddress=shopping_addresses::where('userId',$user_id)->first();
        $product=Card::where('user_id',$user_id)->get();

        foreach ($product as $item) {
            // echo "<pre>";
            // print_r($item);
            // echo "</pre>";
            // exit;
           Order::create([
            'userId'=>$user_id,
            'ProductId'=>$item->id,
            'ProductPrice'=>$item->product_price,
            'ProductQty'=>$item->product_qty,
            'userPhone'=>$shippingAddress->phoneNumber,
            'userPresentAddress'=>$shippingAddress->presentAddress,
            'userPostalCode'=>$shippingAddress->postalCode,
            'Status'=>'pending',
            ]); 
            $items = $item->id;
            Card::findOrFail($items)->delete();
        }
        return redirect()->route('pendingOrder')->with([
            'message' => 'Order submit  successfully!',
            'alert-type' => 'success'
        ]);

    }
    public function cancelOrder()
    {
        $user_id=Auth::id();
        $shippingAddress=shopping_addresses::where('userId',$user_id)->first();
        $product=Card::where('user_id',$user_id)->get();

        foreach ($product as $item) {
            $items = $item->id;
            Card::findOrFail($items)->delete();
        }
        return redirect()->route('pendingOrder')->with([
            'message' => 'Order cancel  successfully!',
            'alert-type' => 'success'
        ]);

    }



    public function userProfile()
    {
        // Return the user profile view
        return view('userTemp.userProfile', ['user' => Auth::user()]);
    }

    
    public function pendingOrder(){
        $userId = Auth::id();
        $orderItems=Order::where('userId',$userId)->get();
        return view('userTemp.pendingOrder' ,compact('orderItems'));
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
