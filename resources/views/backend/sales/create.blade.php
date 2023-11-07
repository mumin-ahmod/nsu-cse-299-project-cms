@extends('backend.layouts.master')

@section('main_content')

    <div class="container">
        <h2>Create Sale</h2>
        <form method="post" action="{{ route('sales.store') }}">
            @csrf

            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <!-- Add a select input to choose the customer -->
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">Select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->CustomerID }}">{{ $customer->First_Name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sale_date">Sale Date:</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="product_id">Product:</label>
                <!-- Add a select input to choose the product -->
                <select name="product_id" id="product_id" class="form-control">
                    <option value="">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity_sold">Quantity Sold:</label>
                <input type="number" name="quantity_sold" id="quantity_sold" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price:</label>
                <input type="text" name="unit_price" id="unit_price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="text" name="total_price" id="total_price" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Sale</button>
        </form>
    </div>
@endsection

