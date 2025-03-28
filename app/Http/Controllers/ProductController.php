<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Events\ListProductsAdded;
use App\Events\ListProductsUpdated;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->category_id;
        if($filter) {
            $products = Product::with('category')->where('category_id', $filter)->get();
        } else {
            $products = Product::with('category')->get();
        }
        return $products;
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'stock' => 'required|integer|min:0', // Fixed, ensure stock is not less than 0
                'category_id' => 'required|exists:categories,id',
            ], [ //custom error messages
                'name.required' => 'Name is required.',
                'stock.required' => 'Stock is required.',
                'stock.min' => 'Stock must be at least 0 and cannot be negative number.',
                'category_id.exists' => 'The selected category does not exist.',
                'category_id.required' => 'Category is required.',
            ]);
    
            $product = Product::create($validated);
            $product->load('category');
            ListProductsAdded::dispatch($product);

            return response()->json($product, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
