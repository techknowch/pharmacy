<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineGeneric;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        $generic = MedicineGeneric::all();
        $category = Category::all();
        $supplier = Supplier::all();
        return view('medicines.create',compact('generic','category', 'supplier'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'category' => 'required|string',
                'name' => 'required|string',
                'purchase' => 'required|numeric',
                'selling' => 'required|numeric',
                'box' => 'required|numeric',
                'items' => 'required|numeric',
                'status' => 'required|string',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'expiry_date' => 'required|date',
            ]);

            // Create and store the new medicine
            $medicine = new Medicine();
            $medicine->category = $request->input('category');
            $medicine->name = $request->input('name');
            $medicine->purchase_price = $request->input('purchase');
            $medicine->selling_price = $request->input('selling');
            $medicine->boxes_qty = $request->input('box');
            $medicine->total_items = $request->input('items');
            $medicine->generic_name = $request->input('status');
            $medicine->description = $request->input('description');
            $medicine->expiry_date = $request->input('expiry_date');
            $medicine->status = $request->input('status');
            
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $medicine->image = $imageName;
            }

            $medicine->save();

            // Redirect back with a success message
            return redirect()->route('medicines.create')->with('success', 'Medicine created successfully.');
        } catch (QueryException $e) {
            // Handle database query exceptions
            return redirect()->route('medicines.create')->with('error', 'Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->route('medicines.create')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }
    public function destroy($id)
    {
        try {
            // Find the medicine by its ID
            $medicine = Medicine::findOrFail($id);

            // Delete the medicine record
            $medicine->delete();

            // Redirect back with a success message
            return response()->json(['success' => true, 'message' => 'Medicine deleted successfully.']);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['success' => false, 'message ' => $e->getMessage()]);
        }
    }
}
