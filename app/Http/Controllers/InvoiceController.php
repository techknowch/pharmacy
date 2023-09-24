<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Medicine;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        $medicines = Medicine::all();
        return view('invoices.create', compact('customers', 'medicines'));
    }

    public function store(Request $request)
    {

    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

}