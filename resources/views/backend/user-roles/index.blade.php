@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>User Roles</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->roles->isNotEmpty())
                        {{ $user->roles[0]->role }}
                    @else
                        User
                    @endif
                </td>
                <td>
                    @if ($user->roles->isEmpty() || $user->roles[0]->role != 'admin')
                        <form method="POST" action="{{ route('user-roles.make-admin', $user) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Make Admin</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('user-roles.remove-admin', $user) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning">Remove Admin</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
