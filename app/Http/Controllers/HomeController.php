<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class HomeController extends Controller
{
    public function home()
    {
        
        $allCustomerCount=Sell::count();
        $allOrderCount=Product::count();
        $allProductCount=Product::count();
        return view ('backend.pages.dashboard',compact('allCustomerCount','allOrderCount','allProductCount'));
    }
}
