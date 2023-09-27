<?php

namespace App\Http\Controllers;

use App\Models\MedicineGeneric;
use Illuminate\Http\Request;

class MedicineGenericController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $generic = MedicineGeneric::all();
        return view('generic.index', compact('generic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('generic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $existingCategory = MedicineGeneric::where('name', $request->input('name'))->first();

        if ($existingCategory) {
            // Return an error message
            return redirect()->route('medicine-generics.create')->with('error', 'Generic name already exists.');
        }

        MedicineGeneric::create($request->all());

        return redirect()->route('medicine-generics.create')->with('success', 'Generic name created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // Find and delete the record
        $category = MedicineGeneric::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Generic Category not found'], 404);
        }

        $category->delete();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Generic Category deleted successfully']);
    }
}
