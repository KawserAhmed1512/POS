<?php

namespace App\Http\Controllers;
use App\Models\customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $allcustomer=customer::paginate(4);
        return view('backend.customer',compact('allcustomer'));
    }

    public function form()
    {
        return view('backend.customerform');
    }

    public function store(Request $request)

    {

        customer::create([
            'name'=>$request->cus_name,
            'phone'=>$request->cus_phone,
            'address'=>$request->cus_address
        ]);
        return redirect()->back();
    }
}
