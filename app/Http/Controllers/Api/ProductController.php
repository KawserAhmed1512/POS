<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProduct()
    {
         $product = Product::all();
         return response()->json($product);
    }
    public function createProduct(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'product_name'=>'required',
            'product_price'=>'required|numeric|min:10',
            'product_image'=>'required|file',
            'category_id'=>'required',
            'product_quantity'=>'required'
            
          ]);
    
          if($validation->fails())
          {
            return response()->json([
                'success'=>false,
                'data'=>null,
                'message'=>$validation->getMessageBag(),
            ]);
          }
    
          $fileName=null;
          //check file exits
          if($request->hasFile('product_image'))
          {
         
              $file=$request->file('product_image');
    
              //file name generate
              $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
    
               //file store where i want to 
              $file->storeAs('/',$fileName);
         
          }
    
        $product=  Product::create([
            'name'=>$request->product_name,
            'price'=>$request->product_price,
            'image'=>$fileName,
            'category_id'=>$request->category_id,
            'quantity'=>$request->product_quantity
    
            
            
           ]);
    
           return response()->json([
            'success'=>true,
            'data'=>$product,
            
           ]);
    
    }
}
