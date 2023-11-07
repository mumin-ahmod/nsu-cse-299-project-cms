@extends('backend.layouts.master')

@section('main_content')

    <div class="container">
        <h2>Customer List</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-2">Add Customer</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Postal/ZIP Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($customers))
                    <h2>No data to show</h2>
                @else
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->First_Name }}</td>
                            <td>{{ $customer->Email }}</td>
                            <td>{{ $customer->Phone }}</td>
                            <td>{{ $customer->Address }}</td>
                            <td>{{ $customer->Postal_ZIP_Code }}</td>
                            <td>
                        
                                <a href="{{ route('customers.edit', $customer->CustomerID) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('customers.destroy', $customer->CustomerID) }}" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
