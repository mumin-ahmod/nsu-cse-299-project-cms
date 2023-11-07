<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //all data show
    public function index()
    {
        $companies = Company::all();
        return view('backend.companies.index', compact('companies'));
    }

    // input form
    public function create()
    {
        $customers = Customer::all(); // Retrieve the list of customers

        return view('backend.companies.create', compact('customers'));
    }

    //store korar jonno
    public function store(Request $request)
    {
        $data = $request->validate([
            'Company_Name' => 'required|string',
            'Contact_Person' => 'required',
            'Email' => 'required|email',
            'Phone' => 'nullable|string',
            'Address' => 'nullable|string',
        ]);

        Company::create($data);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }
    public function show(Company $company)
    {
        // Logic to show a specific company
    }

    public function edit(Company $company)
    {
       

        $companies = Company::all();
        return view('backend.companies.edit', compact('companies', 'company'));
    }

    public function update(Request $request, Company $company)
    {
        try {
            $data = $request->validate([
                'Company_Name' => 'required|string',
                'Contact_Person' => 'required',
                'Email' => 'required|email',
                'Phone' => 'nullable|string',
                'Address' => 'nullable|string',
            ]);

            $company->update($data);
            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('companies.edit', $company)->with('error', 'Error: Unable to update the company.');
        }
    }

    public function destroy(Company $company)
    {
        try {
            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->route('companies.index')->with('error', 'Error: Unable to delete the company. It may be associated with other data.');
        }
    }
}
