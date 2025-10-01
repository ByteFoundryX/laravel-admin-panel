<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
          public function index()
    {
    
        $item = AboutUs::first();
        return view('about.index' , compact('item'));

    }


       
    public function edit(AboutUs $about)
    {
    
        return view('about.edit' , compact('about'));

    }



        
    public function update(Request $request ,  AboutUs $about)
    {
    
           
        $request->validate([
                
            'title' => 'required|string',
            'link' => 'required|string',
            'body' => 'required|string',

        ]);


        $about->update([
               
            'title' => $request->title,
            'link' => $request->link,
            'body' => $request->body,

        ]);

        return redirect()->route('about.index')->with('success' , 'ویراش درباره ما  انجام شد');


}

}