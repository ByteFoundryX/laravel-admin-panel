<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('dashborad');


Route::group(['prefix' => 'Sliders'] , function(){
     
    Route::get('/create' , [SliderController::class , 'create'])->name('slider.create');

});