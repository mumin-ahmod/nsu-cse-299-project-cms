<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //

    public function index()
    {
        $sales = Sale::all();
        return view('backend.sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all(); // Retrieve all customers
        $products = Product::all(); // Retrieve all products

        return view('backend.sales.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the form input
            $request->validate([
                'customer_id' => 'required',
                'product_id' => 'required',
                'sale_date' => 'required',
                'quantity_sold' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'total_price' => 'required|numeric',
            ]);

            // Create a new sale record
            $sale = Sale::create($request->all());

            return redirect()->route('sales.index')->with('message', 'Sale created successfully.');
        } catch (\Exception $e) {
            return back()->with('message', 'An error occurred while creating the sale.');
        }
    }

    public function destroy(Sale $sale)
    {
        try {
            // Attempt to delete the sale record
            $sale->delete();

            return redirect()->route('sales.index')->with('message', 'Sale deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('message', 'An error occurred while deleting the sale.');
        }
    }

    public function edit(Sale $sale)
    {
        return view('backend.sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        try {
            // Validate the form input
            $request->validate([
                'sale_date' => 'required',
                'quantity_sold' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'total_price' => 'required|numeric',
            ]);

            // Update the sale record
            $sale->update($request->all());

            return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating the sale.');
        }
    }

    public function salesChart()
    {
        // Query your database or data source to retrieve sales data
        $salesData = DB::table('sales')
            ->select('sale_date', DB::raw('SUM(total_price) as total_sales'))
            ->groupBy('sale_date')
            ->orderBy('sale_date')
            ->get();

        // Prepare the data for the chart
        $dates = $salesData->pluck('sale_date')->toArray();
        $sales = $salesData->pluck('total_sales')->toArray();

       // dd( $dates);
       // dd( $sales);


        return view('backend.sales.sales-chart', compact('dates', 'sales'));
    }

}
