@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>Create Company</h2>
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <div class="form-group">
            <label for="Company_Name">Company Name</label>
            <input type="text" class="form-control" id="Company_Name" name="Company_Name" required>
        </div>
        <div class="form-group">
            <label for="Contact_Person">Contact Person</label>
            <select class="form-control" id="Contact_Person" name="Contact_Person">
                <option value="">Select Contact Person</option>
                @foreach ($customers as $person)
                    <option value="{{ $person->CustomerID }}">{{ $person->First_Name }}</option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary">Create Company</button>
    </form>
</div>
@endsection
