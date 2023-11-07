<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('backend.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'First_Name' => 'required|string',
            'Email' => 'required|email|unique:customers',
            'Phone' => 'nullable|string',
            'Address' => 'nullable|string',
            'Postal_ZIP_Code' => 'nullable|string',
        ]);

        $customer = Customer::create($data);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        // Logic to show a specific customer
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'First_Name' => 'required|string',
            'Email' => 'required|email|unique:customers,Email,' . $customer->id,
            'Phone' => 'nullable|string',
            'Address' => 'nullable|string',
            'Postal_ZIP_Code' => 'nullable|string',
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (QueryException $e) {
            return redirect()->route('customers.index')->with('error', 'Error: Unable to delete the customer. It may be associated with other data.');
        }
    
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
