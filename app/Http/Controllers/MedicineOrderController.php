<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineOrder;
use App\Models\Medicine;
use App\Models\OrderProduct;

class MedicineOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = MedicineOrder::all();

        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Medicine::all();

        return view('orders.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'customer_name' => 'required|string',
                'customer_address' => 'required|string',
                'phone' => 'required|string',
                'total_price' => 'required|numeric',
                'product_id' => 'required',
                'quantity' => 'required',
                'itemprice' => 'required',
                'subtotal' => 'required',
            ]);

            // Create a new order
            $order = new MedicineOrder([
                'customer_name' => $request->input('customer_name'),
                'customer_address' => $request->input('customer_address'),
                'phone' => $request->input('phone'),
                'total_price' => $request->input('total_price'),
            ]);

            // Save the order
            $order->save();

            // Process and save order products
            $productIds = $request->input('product_id');
            $quantities = $request->input('quantity');
            $itemPrices = $request->input('itemprice');
            $subtotals = $request->input('subtotal');

                $orderProduct = new OrderProduct([
                    'order_id' => $order->id,
                    'product_id' => $productIds,
                    'quantity' => $quantities,
                    'item_price' => $itemPrices,
                    'subtotal' => $subtotals,
                ]);

                $orderProduct->save();

            return redirect()->route('orders.index')->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create the order. ' . $e->getMessage());
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
        //
    }
}
