<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the categories.
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $existingCategory = Category::where('name', $request->input('name'))->first();

        if ($existingCategory) {
            // Return an error message
            return redirect()->route('categories.create')->with('error', 'Category already exists.');
        }

        Category::create($request->all());

        return redirect()->route('categories.create')->with('success', 'Category created successfully.');
    }

    // Display the specified category.
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in the database.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database.
    public function destroy($id)
    {
        // Find and delete the record
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        $category->delete();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Category deleted successfully']);
    }
}
