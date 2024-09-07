<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SellDetail;
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


    public function cancelOrder($id)
    {

        $order=Sell::find($id);

        $order->update([
            'status'=>'cancel'
        ]);


        $items=SellDetail::where('order_id',$id)->get();
        foreach($items as $item)
        {
            $product=Product::find($item->product_id);
            $product->increment('stock',$item->product_quantity);

        }

        notify()->success('Order cancelled');
        return redirect()->back();
    }


    
}
