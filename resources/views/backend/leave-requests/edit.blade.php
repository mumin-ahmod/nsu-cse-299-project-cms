@extends('backend.layouts.master')

@section('main_content')
<div class="container">
    <h2>Leave Requests</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Description</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveRequests as $leaveRequest)
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->user->name }}</td>
                    <td>{{ $leaveRequest->description }}</td>
                    <td>{{ $leaveRequest->from_date }}</td>
                    <td>{{ $leaveRequest->to_date }}</td>
                    <td>{{ $leaveRequest->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
