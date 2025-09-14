<?php

use Illuminate\Support\Facades\Route;

use App\Models\Brand;
Route::get('/', function () {
    $brands = Brand::orderByDesc('rating')->get();
    return view('toplist', compact('brands'));
});
