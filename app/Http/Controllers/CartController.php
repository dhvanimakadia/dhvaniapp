<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use App\Models\Cart; 
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function index()
    {
        
        $cartItems = Cart::with('product')->get(); 
        $info = []; // Initialize an empty array outside the loop
    
        foreach ($cartItems as $cartItem) {
            if ($cartItem->product) { // Check if product is not null
                $info[] = [ 
                    'totalAmt' => $cartItem->quantity * $cartItem->product->price,
                    'productId' => $cartItem->product->id, // Example of using product id
                ];
            }
        }
    
        $totalSum = 0; // Initialize sum variable
        foreach ($info as $item) {
            $totalSum += $item['totalAmt']; 
        }
    
        return view('frontend.view', compact('cartItems', 'totalSum'));
    }
    

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'productid' => 'required|integer',
        'quantity' => 'required|integer'
    ]);

    // Create a new cart item
    $cartItem = Cart::create([
        'productid' => $validatedData['productid'],
        'quantity' => $validatedData['quantity']
    ]);

    $product = Product::store($validatedData['productid']);

    return response()->json([
        'success' => true,
        'data' => [
            'cartItem' => $cartItem,
            'product' => $product
        ]
    ], 201);
}
   
public function cartupdt(request $request)
{
    $info = array(
        'quantity' => $request->new_quantity
    );
    Cart::where('productid',$request->product_id)->update( $info );

    $cartItems = Cart::with('product')->get(); 
        $info = []; // Initialize an empty array outside the loop
         foreach ($cartItems as $cartItem) {
             $info[] = [ 
                 'totalAmt' => $cartItem->quantity *  $cartItem->product->price,
             ];
         }
         $totalSum = 0; // Initialize sum variable
         foreach ($info as $item) {
             $totalSum += $item['totalAmt']; 
         }

    return $totalSum  . ' Rs';
}

public function additem()
{
    // Assuming Cart model has a relationship 'product' defined correctly
    $cartItems = Cart::with('product')->get();

    // Calculate total sum with proper checks
    $totalSum = $cartItems->sum(function ($item) {
        // Check if $item->product is not null before accessing its properties
        if ($item->product) {
            return $item->product->price * $item->quantity;
        } else {
            return 0; // or handle the case where product is null
        }
    });

    return view('frontend.purchase', [
        'cartItems' => $cartItems,
        'totalSum' => $totalSum,
    ]);
}

}

