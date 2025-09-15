<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    // List brands based on geolocation (CF-IPCountry header)
    public function index(Request $request)
    {
        $country = $request->header('CF-IPCountry');
        if ($country) {
            $brands = Brand::where('country_code', $country)->orderByDesc('rating')->get();
            if ($brands->count() > 0) {
                return response()->json($brands);
            }
        }
        // Default toplist if country not found or no brands for country
        return response()->json(Brand::orderByDesc('rating')->get());
    }

    // Show a single brand
    public function show($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        return response()->json($brand);
    }

    // Create a new brand
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string',
            'brand_image' => 'required|string',
            'rating' => 'required|integer',
        ]);
        $brand = Brand::create($validated);
        return response()->json($brand, 201);
    }

    // Update a brand
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        $validated = $request->validate([
            'brand_name' => 'sometimes|string',
            'brand_image' => 'sometimes|string',
            'rating' => 'sometimes|integer',
        ]);
        $brand->update($validated);
        return response()->json($brand);
    }

    // Delete a brand
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        $brand->delete();
        return response()->json(['message' => 'Brand deleted']);
    }
}
