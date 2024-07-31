<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Jwellery;
use App\Models\Owner;

class GalleryController extends Controller
{
    public function index()
    {
        
       $products=Product::all();
       $jwellery=Jwellery::all();
       $owner=Owner::all();
        return view('gallery.index',compact('products','jwellery','owner'));
    }
}
