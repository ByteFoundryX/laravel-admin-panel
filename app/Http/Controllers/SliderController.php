<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function create()
    {
    
        return view('Sliders.create');

    }



      public function store(Request $request)
    {
    
       
        $request->validate([
                
            'title' => 'required|string',
            'link_title' => 'required|string',
            'link_address' => 'required|string',
            'body' => 'required|string',

        ]);


        Slider::create([
               
            'title' => $request->title,
            'link_title' => $request->link_title,
            'link_address' => $request->link_address,
            'body' => $request->body,

        ]);


    }
}

