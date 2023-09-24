<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
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
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantiy' => 'required',
            'discount' => 'required',
            // Add more validation rules as needed.
        ]);

        Medicine::create($data);

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }

}