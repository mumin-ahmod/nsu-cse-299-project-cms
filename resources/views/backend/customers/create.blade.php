@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>Create Customer</h2>
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="form-group">
            <label for="First_Name">First Name</label>
            <input type="text" class="form-control" id="First_Name" name="First_Name" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="tel" class="form-control" id="Phone" name="Phone">
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <textarea class="form-control" id="Address" name="Address" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="Postal_ZIP_Code">Postal/ZIP Code</label>
            <input type="text" class="form-control" id="Postal_ZIP_Code" name="Postal_ZIP_Code">
        </div>
        <button type="submit" class="btn btn-primary">Create Customer</button>
    </form>
</div>
@endsection
