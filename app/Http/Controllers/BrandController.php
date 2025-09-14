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
        // Example: country-specific toplist logic
        // You can extend this with a Country model or config for real data
        $iso2CountryBrands = [
            'FR' => Brand::where('brand_name', 'like', '%France%')->orderByDesc('rating')->get(),
            'DE' => Brand::where('brand_name', 'like', '%Germany%')->orderByDesc('rating')->get(),
            // Add more ISO-2 country codes and logic as needed
        ];
        if ($country && isset($iso2CountryBrands[$country]) && $iso2CountryBrands[$country]->count() > 0) {
            return response()->json($iso2CountryBrands[$country]);
        }
        // Default toplist if country not found or empty
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
