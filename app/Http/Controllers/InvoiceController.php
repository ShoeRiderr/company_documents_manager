<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store()
    {
        return view('invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function update()
    {
        return view('invoices.index');
    }

    public function show()
    {
        return view('invoices.index');
    }

    public function destroy()
    {
        return view('invoices.index');
    }
}
