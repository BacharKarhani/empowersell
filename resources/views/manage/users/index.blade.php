@extends('layouts.adminlayout')

@section('content')
    <h2>Manage Users</h2>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;">
                            <img src="{{ $user->profile_picture }}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                    <td>
                        <a href="{{ route('manage.users.show', $user->id) }}">View</a>
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
