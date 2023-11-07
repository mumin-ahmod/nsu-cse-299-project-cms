@extends('backend.layouts.master')

@section('main_content')

    <div class="container">
        <h2>Sales</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Sale Date</th>
                    <th>Quantity Sold</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->product->product_name }}</td>
                        <td>{{ $sale->sale_date }}</td>
                        <td>{{ $sale->quantity_sold }}</td>
                        <td>{{ $sale->unit_price }}</td>
                        <td>{{ $sale->total_price }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Edit</a>
                            <form method="post" action="{{ route('sales.destroy', $sale->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this sale?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
