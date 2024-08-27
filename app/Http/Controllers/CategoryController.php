<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Support\Facades\Redis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list()
    {
        $allcategory=category::paginate(20);
        return view('backend.category',compact('allcategory'));
    }

    public function form()
    {
        $allcategory=category::all();
        return view('backend.categoryform',compact('allcategory'));
    }

    public function store(Request $request)
    {

        
        $validation=Validator::make($request->all(),[

            'name'=>'required',
            // 'image'=>'required|file'

        ]);

        
        if($validation->fails())

        {

            // dd($validation->getMessageBag());
            notify()->error($validation->getMessageBag());
            return redirect()->back();


            
        }

       
        $fileName=null;

        if($request->hasFile('image'))
        {

            $file=$request->file('image');

            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

            $file->storeAs('/',$fileName);
        }



        category::create([
            'name'=>$request->name,
            'image'=>$fileName
        ]);

        return redirect()->route('category');
    }
}
