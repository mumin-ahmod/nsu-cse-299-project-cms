@extends('backend.layouts.master')

@section('main_content')
<div class="container">
    <h2>My Leave Requests <a href="{{route('leave-requests.create')}}" class="btn btn-outline-success">Ask for Leave</a></h2>

    @if ($leaveRequests->isEmpty())
        <p>No leave requests found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $leaveRequest)
                    <tr>
                        <td>{{ $leaveRequest->id }}</td>
                        <td>{{ $leaveRequest->description }}</td>
                        <td>{{ $leaveRequest->from_date }}</td>
                        <td>{{ $leaveRequest->to_date }}</td>
                        <td>{{ $leaveRequest->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('leave-requests.destroy', $leaveRequest) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
