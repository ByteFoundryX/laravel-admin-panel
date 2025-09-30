<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
  
        public function index()
    {
    
        $features = Feature::all();
        return view('Features.index' , compact('features'));

    }


        
    public function create()
    {
    
        return view('Features.create');

    }




    
      public function store(Request $request)
    {
    
       
        $request->validate([
                
            'title' => 'required|string',
            'icon' => 'required|string',
            'body' => 'required|string',

        ]);


        Feature::create([
               
            'title' => $request->title,
            'icon' => $request->icon,
            'body' => $request->body,

        ]);


        
         return redirect()->route('feature.index')->with('success' , 'ویژگی ایجاد شد');


    }



  
    public function edit(Feature $feature)
    {
    
        return view('features.edit' , compact('feature'));

    }




          
    public function update(Request $request ,  Feature $feature )
    {
    
           
        $request->validate([
                
            'title' => 'required|string',
            'icon' => 'required|string',
            'body' => 'required|string',

        ]);


        $feature->update([
               
            'title' => $request->title,
            'icon' => $request->icon,
            'body' => $request->body,

        ]);

        return redirect()->route('feature.index')->with('success' , 'ویژگی ویرایش شد ');

    }


         public function destroy(Feature $feature)
    {
    
        $feature->delete();
        return redirect()->route('feature.index')->with('warning' , 'ویژگی حذف شد');
    }



}
