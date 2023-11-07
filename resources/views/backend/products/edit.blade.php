@extends('backend.layouts.master')

@section('main_content')
    <div class="container">
        <h2>Create Product</h2>
        <form method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price:</label>
                <input type="text" name="unit_price" id="unit_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity_in_stock">Quantity in Stock:</label>
                <input type="number" name="quantity_in_stock" id="quantity_in_stock" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
