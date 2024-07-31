<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function selectAddress($productId)
    {
        // Fetch user's saved addresses
        $addresses = auth()->user()->addresses;

        return view('select_address', compact('addresses', 'productId'));
    }

    public function storeAddress(Request $request)
    {
        // Validate and save the address selection
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
        ]);

        // Store the selected address in session or database
        session(['selected_address' => $request->address_id]);

        // Redirect to the next step (e.g., payment or order confirmation)
        return redirect()->route('checkout', ['product_id' => $request->product_id]);
    }
}
