@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>Create Leave Request</h2>

    <form action="{{ route('leave-requests.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input type="date" class="form-control" name="from_date" id="from_date">
        </div>

        <div class="form-group">
            <label for="to_date">To Date:</label>
            <input type="date" class="form-control" name="to_date" id="to_date">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
