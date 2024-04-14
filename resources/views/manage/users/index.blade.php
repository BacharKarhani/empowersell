@extends('layouts.adminlayout')

@section('content')
    <h2>Manage Users</h2>
    <table>
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
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                    <td>
                        <a href="{{ route('manage.users.show', $user->id) }}">View</a>
                        <a href="{{ route('manage.users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('manage.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
