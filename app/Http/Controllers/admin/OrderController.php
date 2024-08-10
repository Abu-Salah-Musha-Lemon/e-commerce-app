<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\order;
use App\Models\product;
use App\Models\Card;
use App\Models\shopping_addresses;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $orderItems=Order::get();
        return view("admin.orders.pendingOrder",compact('orderItems'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $user_id=Auth::id();
        $shippingAddress=shopping_addresses::where('userId',$user_id)->first();
        $product=Card::where('user_id',$user_id)->get();

        foreach ($product as $item) {
           Order::create([
            'userId'=>$user_id,
            'ProductId'=>$item->id,
            'ProductPrice'=>$item->product_price,
            'ProductQty'=>$item->product_quantity,
            'ProductPhone'=>$shippingAddress->phoneNumber,
            'ProductPresentAddress'=>$shippingAddress->presentAddress,
            'ProductPostalCode'=>$shippingAddress->postalCode,
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

    /**
     * Display the specified resource.
     */
    public function completeOrder()
    {
        $orderItems=Order::get();
        return view("admin.orders.completeOrder",compact('orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approveOrder($id)
    {
        // Retrieve the specific order
        $order = Order::find($id);
    
        if (!$order) {
            return redirect()->back()->with([
                'message' => 'Order not found!',
                'alert-type' => 'error'
            ]);
        }
    
        // Check the status of the order
        if ($order->Status === 'pending') {
            // Update the status of the specific order
            $order->update([
                'Status' => 'success',
            ]);
    
            return redirect()->back()->with([
                'message' => 'Order approved successfully!',
                'alert-type' => 'success'
            ]);
        }
    
        return redirect()->back()->with([
            'message' => 'Order cannot be approved because it is not pending!',
            'alert-type' => 'error'
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
