<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('dashborad');


Route::group(['prefix' => 'Sliders'] , function(){
    Route::get('/' , [SliderController::class , 'index'])->name('slider.index');
     Route::get('/create' , [SliderController::class , 'create'])->name('slider.create');
     Route::post('/' , [SliderController::class , 'store'])->name('slider.store');
     Route::get('/{slider}/edit' , [SliderController::class , 'edit'])->name('slider.edit');
     Route::put('/{slider}' , [SliderController::class , 'update'])->name('slider.update');

});

