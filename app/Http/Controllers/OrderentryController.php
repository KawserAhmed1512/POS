<?php

namespace App\Http\Controllers;
use App\Http\Orderentry;
use App\Mail\PlaceorderEmail;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SellDetail;
use App\Models\Stock;
use Illuminate\Support\Facades\Mail;

class OrderentryController extends Controller
{




    public function orderentry(){

        $products=product::all();
       
        $myCart=session()->get('basket')??[];

        return view('backend.orderentry',compact('products','myCart'));

        
    }
    public function Reportlist()
    {
        if(request()->has('from_date') && request()->has('to_date'))
        {
            $allcustomer = Sell::whereBetween('created_at',[request()->from_date,request()->to_date])->get();
            return view('backend.report',compact('allcustomer'));
        }
        
        $allcustomer = Sell::all();
        return view('backend.report',compact('allcustomer'));
    }

    public function showProduct($id){


        $singleProductlist=Product::find($id);

        $relatedProduct=Product::where('id','!=','$singleProduct->id')
                        ->limit(4)
                        ->get();


     //method chaining

     return view('backend.pages.single_product',compact('singleProduct','relatedProduct'));
    
        
    }

    public function addToCart($pId)

    {
        
        $product=Product::find($pId);
        $myCart=session()->get('basket');
        // dd($myCart);
        //step 1: cart empty
        if(empty($myCart))
        {
            //action: add to cart
            $cart[$product->id]=[
                //key=>value
                'product_id'=>$product->id,
                'product_name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                'subtotal'=>1 * $product->price,
                'image'=>$product->image
            ];

            session()->put('basket',$cart);

            notify()->success('Product added to cart.');
            return redirect()->back();
        }else{

            if(array_key_exists($pId,$myCart))
            {
                // dd($myCart[$pId]);
                //step 2: quantity update, subtotal update
               //q=1,sub=300
                $myCart[$pId]['quantity'] = $myCart[$pId]['quantity'] + 1;
                $myCart[$pId]['subtotal'] = $myCart[$pId]['quantity'] * $myCart[$pId]['price'];

                session()->put('basket',$myCart);

                notify()->success('Quantity updated.');
                return redirect()->back();


            }
            else{
                //step 3: add to cart
                $myCart[$product->id]=[
                    'product_id'=>$product->id,
                    'product_name'=>$product->name,
                    'price'=>$product->price,
                    'quantity'=>1,
                    'subtotal'=>1 * $product->price,
                    'image'=>$product->image
                ];

                
                session()->put('basket',$myCart);
                notify()->success("Product Added to Cart");
                return redirect()->back();
            }
        }
    }

    public function placeOrder(Request $request)
    {

        //dd($request->all());
        //step1 validation
    //   $validation=Validator::make($request->all(),[
    //     'receiver_name'=>'required',
    //     'email'=>'required|email',
    //     'address'=>'required',
    //     'paymentMethod'=>'required|in:cod,online'
    //     ]);

    // if($validation->fails())
    // {
    //     notify()->error($validation->getMessageBag());
       
    //     return redirect()->back();
    // }



        if( $mycart=session()->get('basket')){
        
        
        //quary for store data into Orders table
       
        $order=Sell::create([
            'receiver_name'=>$request->receiver_name,
            'receiver_email'=>$request->receiver_email,
            'receiver_address'=>$request->address,
            'receiver_mobile'=>$request->receiver_mobile,
            'payment_method'=>$request->paymentMethod,
            //'customer_id'=>auth('customerGuard')->user()->id,
            'total_amount'=>array_sum(array_column($mycart,'subtotal'))

        ]);

        //quary for storing data into Order_details table
           
        foreach($mycart as $singleData)
        {
          
            SellDetail::create([
                'order_id'=>$order->id,
                'product_id'=>$singleData['product_id'],
                'product_unit_price'=>$singleData['price'],
                'product_quantity'=>$singleData['quantity'],
                'subtotal'=>$singleData['subtotal'],
            ]);

            $product = Product::find($singleData['product_id']);
            $product->decrement('quantity',$singleData['quantity']);
        }
           

        notify()->success('Order place successfully.');

        //send place order confirmation mail


        session()->forget('basket');

        Mail::to($request->receiver_email)->send(new PlaceorderEmail($order));
        return redirect()->back();

    }
    else
        {
            notify()->success('cart is empty.');

            return redirect()->back();


        }

    }





    public function viewCart()
    {
        //ternary operator (condition) ? statement 1 : statement2

        //null coalescing ??
        //$a=5; $b=6;
        // $x= $a ?? $b

        $myCart=session()->get('basket') ?? [];

    //    dd($myCart);
        return view('backend.orderentry',compact('myCart'));
    }

    public function clearCart()
    {

      session()->forget('basket');

      notify()->success('Cart clear.');

      return redirect()->back();

    }

    public function cartItemDelete($productId)
    {
        
        $cart=session()->get('basket');

       unset($cart[$productId]);


    
       session()->put('basket',$cart);

       notify()->success('Item remove.');

       return redirect()->back();



       

    }

    // public function search()
    // {
    //     $products=Product::where('name','LIKE','%'.request()->search_key.'%')->get(); 

    //     return view('backend.productentry',compact('products'));
    
    // }


    public function viewInvoice($id)
    {
        $order=Sell::with('selldetails')->find($id);

        return view('backend.pages.invoice',compact('order'));
    }


}



   
    




    

        

