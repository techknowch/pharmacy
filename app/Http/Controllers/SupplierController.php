<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:suppliers,email',
                'phone' => 'required|numeric',
                'status' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            // Create and store the new supplier
            Supplier::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status'),
                'address' => $request->input('address'),
            ]);

            // Redirect back with a success message
            return redirect()->route('suppliers.create')->with('success', 'Supplier created successfully.');
        } catch (QueryException $e) {
            return redirect()->route('suppliers.create')->with('error', 'Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('suppliers.create')->with('error', 'An error occurred: ' . $e->getMessage());
        }
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
        // Find and delete the record
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['success' => false, 'message' => 'Supplier not found'], 404);
        }

        $supplier->delete();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Supplier deleted successfully']);
    }
}
