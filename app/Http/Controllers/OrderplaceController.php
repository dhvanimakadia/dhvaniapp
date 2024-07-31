<?php

namespace App\Http\Controllers;
use App\Models\orderplace;
use Illuminate\Http\Request;

class OrderplaceController extends Controller
{

    public function index(){
     
            $order = Orderplace::get();
            return view('frontend.view', compact('order'));
        }
    
       
        // public function placeorder(Request $request)
        // {
        //     // Retrieve data from request
        //     $cartItems = $request->input('cartItems');
        //     $totalSum = $request->input('totalPrice');
    
         
        //     $order = new Order();
        //     $order->totalprice = $totalSum;
        //     $order->save();
    
        
        //     foreach ($cartItems as $cartItemId => $cartItemData) {
        //         $orderItem = new OrderItem();
        //         $orderItem->orderid = $order->id;
        //         $orderItem->productid = $cartItemData['product_id']; // Adjust key according to your form data
        //         $orderItem->quantity = $cartItemData['quantity']; // Adjust key according to your form data
        //         $orderItem->save();
        //     }
    
            
        //     return response()->json(['message' => 'Order placed successfully.', 'order_id' => $order->id]);
        // }

            
        }

