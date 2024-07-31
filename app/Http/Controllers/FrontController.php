<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Jwellery;
use App\Models\Owner;
class FrontController extends Controller
{
   public function index(){
 
    $product=Product::all();
    $jwellery=Jwellery::all();
    $owner=Owner::all();
     return view('front.product',compact('product','jwellery','owner'));
   }

   public function index2(){
      $jwellerys=Jwellery::all();
      return view('front.jwellery',compact('jwellerys'));
   }
  
   public function owner(){
      $owners=Owner::all();
      return view('front.owner',compact('owners'));
   }
  
}
