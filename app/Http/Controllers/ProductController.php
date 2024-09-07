<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
   

    public function list()
    {
        $allProduct=Product::with('category')->paginate(8);
       // dd($allProduct);
        return view('backend.productlist',compact('allProduct'));
    }

    public function create()
    {
      $allCategory=Category::all();
      return view('backend.productform',compact('allCategory'));
    }





    public function store(Request $request)
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
        notify()->error($validation->getMessageBag());
        return redirect()->back();
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

      Product::create([
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'image'=>$fileName,
        'category_id'=>$request->category_id,
        'quantity'=>$request->product_quantity

        
        
       ]);

        notify()->success('product added successfull');
       return redirect()->route('product.list');

    

    }

    public function delete($id)
    {
      $product=Product::find($id);
      $product->delete();

      notify()->success('Product deleted successfully.');
      return redirect()->back();
    }

    public function edit($proid)
    {
      $product=Product::find($proid);
      $allCategory=Category::all();

      return view('backend.pages.product_edit',compact('allCategory','product'));

    }

    public function Update(Request $request,$proid)
    {
      $product=Product::find($proid);
      $product->Update([
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'quantity'=>$request->product_quantity
      ]);



      notify()->success('product updated successfully.');
      return redirect()->route('product.list');



    }















}

