@extends('backend.layouts.master')

@section('main_content')
    <div class="container">
        <h2>Edit Sale</h2>
        <form method="post" action="{{ route('sales.update', $sale->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <input type="text" name="customer_id" id="customer_id" value="{{ $sale->customer_id }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="product_id">Product:</label>
                <input type="text" name="product_id" id="product_id" value="{{ $sale->product_id }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="sale_date">Sale Date:</label>
                <input type="date" name="sale_date" id="sale_date" value="{{ $sale->sale_date }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="quantity_sold">Quantity Sold:</label>
                <input type="number" name="quantity_sold" id="quantity_sold" value="{{ $sale->quantity_sold }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price:</label>
                <input type="text" name="unit_price" id="unit_price" value="{{ $sale->unit_price }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="text" name="total_price" id="total_price" value="{{ $sale->total_price }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Sale</button>
        </form>
    </div>
@endsection
