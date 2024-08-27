<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\Sell;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $allcustomer=Sell::paginate(10);
        return view('backend.customer',compact('allcustomer'));
    }

    

    public function store(Request $request)

    {
        
        customer::create([
            'name'=>$request->customer_name,
            'phone'=>$request->customer_mobile,
            'address'=>$request->customer_address
        ]);
        $cart=session()->forget('basket');
        return redirect()->back();

    }


    
}
