<?php

namespace App\Http\Controllers;

use App\Events\ListCategoriesAdded;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest()->get();
        return $categories;
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            $category = Category::create($validated);
            ListCategoriesAdded::dispatch($category);
            
            return response()->json($category, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
