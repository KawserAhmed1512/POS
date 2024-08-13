<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Stock;



class StockController extends Controller
{
    public function stock()
    {
      $allStock=Product::all();
      
      return view('backend.stocklist',compact('allStock'));

    }



    public function search(){

      $products=Product::where('name','LIKE','%'.request()->search_key.'%')->get();

      return view('backend.stocklist',compact('products'));
    }








}
