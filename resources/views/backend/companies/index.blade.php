@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>Company List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                   
                    <td>{{ $company->Company_Name }}</td>
                    <td>{{ $company->contactPerson->First_Name }}</td>
                    <td>{{ $company->Email }}</td>
                    <td>{{ $company->Phone }}</td>
                    <td>{{ $company->Address }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->CompanyID) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('companies.destroy',$company->CompanyID) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
